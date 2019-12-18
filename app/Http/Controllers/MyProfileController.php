<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Redirect;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('/myprofile/myprofile', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        User::where('id', '=', $id)->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        return Redirect::to('/myprofile')->withSuccessMessage('Të dhënat u përditësuan me sukses!');
    }

    /**
     * Update the specified password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword() {
        return view('/myprofile/myprofilepassword');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function savePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        Auth::user()->update([
            'password' => Hash::make($request['password']),
        ]);

        return Redirect::to('/myprofile/password')->withSuccessMessage('Fjalëkalimi u përditësua me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
