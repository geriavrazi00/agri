<?php


namespace App\Http\Controllers;

use App\Constants;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;

class UsersController extends Controller {

    function __construct() {
        parent::__construct();

        $this->middleware('permission:user-list|user-create|user-edit|user-password|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-password', ['only' => ['changePassword','savePassword']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = $this->evaluateUsersToLoad();
        return view('/admin/users/userslist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::orderBy('name')->get();
        $institutions = User::whereHas('roles', function (Builder $query) {
            $query->where('id', '=', Constants::ROLE_INSTITUTION_ID);
        })->get();

        return view('/admin/users/createusers', compact('roles', 'institutions'));
    }

    /**
     * Validate the incoming requests.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request) {
        return $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validator($request);

        $roleId = $this->evaluateRole($request['role']);
        $role = Role::where('id', '=', $roleId)->with('permissions')->first();
        $permissions = $role->permissions;

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->syncRoles([$roleId]);
        $user->syncPermissions($permissions);
        $user = $this->evaluateInstitutionRelation($user, $request['institution']);
        $user->save();

        return Redirect::to('/users')->withSuccessMessage(trans('messages.user_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        if ($this->evaluateUserSelected($user))
            return view('/admin/users/viewusers', ['user' => $user]);
        else return Redirect::to('/404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        if ($this->evaluateUserSelected($user)) {
            $institutions = User::whereHas('roles', function (Builder $query) {
                $query->where('id', '=', Constants::ROLE_INSTITUTION_ID);
            })->where('id', '!=', $user->id)
            ->get();

            return view('/admin/users/editusers', [
                'user' => $user,
                'roles' => Role::orderBy('name')->get(),
                'institutions' => $institutions,
            ]);
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')->ignore($id)],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);

        if ($this->evaluateUserSelected($user)) {
            $roleId = $this->evaluateRole($request['role']);
            $role = Role::where('id', '=', $roleId)->with('permissions')->first();
            $permissions = $role->permissions;

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->syncRoles([$roleId]);
            $user->syncPermissions($permissions);
            $user = $this->evaluateInstitutionRelation($user, $request['institution']);
            $user->save();

            return Redirect::to('/users')->withSuccessMessage(trans('messages.user_updated'));
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Update the specified password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword($id) {
        $user = User::findOrFail($id);
        if ($this->evaluateUserSelected($user)) {
            return view('/admin/users/userspassword', compact('user'));
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function savePassword(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find($id);

        if ($this->evaluateUserSelected($user)) {
            User::where('id', '=', $id)->update([
                'password' => Hash::make($request['password']),
            ]);

            return Redirect::to('/users')->withSuccessMessage(trans('messages.user_password_updated'));
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);

        if ($this->evaluateUserSelected($user)) {
            $this->deleteUsersConnected($user);
            $user->delete();
            return Redirect::to('/users')->withSuccessMessage(trans('messages.user_deleted'));
        } else {
            return Redirect::to('/404');
        }
    }

    private function evaluateUsersToLoad() {
        if (Auth::user()->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            $users = User::where('id', '!=', Auth::user()->id)
                ->where('user_related_id', '=', Auth::user()->id)
                ->orderBy('name')->get();
        } else {
            $users = User::where('id', '!=', Auth::user()->id)->orderBy('name')->get();
        }

        return $users;
    }

    private function evaluateRole($selectedRole) {
        if (Auth::user()->roles[0]->id == Constants::ROLE_ADMIN_ID) {
            $role = $selectedRole;
        } else {
            $role = Constants::ROLE_BASIC_USER;
        }

        return $role;
    }

    private function evaluateInstitutionRelation($user, $institutionId) {
        if (Auth::user()->roles[0]->id == Constants::ROLE_ADMIN_ID) {
            $user->user_related_id = $institutionId;
        } else if (Auth::user()->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            $user->user_related_id = Auth::user()->id;
        }

        return $user;
    }

    private function evaluateUserSelected($user) {
        if (Auth::user()->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            if (Auth::user()->id == $user->user_related_id) return true;
            else return false;
        }

        return true;
    }

    /** If the selected user is an institution, delete also all the related users to it */
    private function deleteUsersConnected($user) {
        if ($user->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            $connectedUsers = User::where('user_related_id', '=', $user->id)->get();

            foreach ($connectedUsers as $user) {
                $user->delete();
            }
        }
    }
}
