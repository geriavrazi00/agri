<?php

namespace App\Http\Controllers;

use App\Constants;
use DateTime;
use Log;
use App\Plan;

use App\Exports\PlanExcelExport;
use App\Exports\PlanPdfExport;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Jenssegers\Agent\Agent;

class PlansController extends Controller
{
    function __construct() {
        parent::__construct();

        $this->middleware('permission:plan-list|plan-create|plan-delete', ['only' => ['index','show','exportExcel', 'exportPdf']]);
        $this->middleware('permission:plan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $plans = $this->evaluatePlans();
        return view('/plans/planslist', compact('plans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan) {
        $agent = new Agent();

        if ($this->evaluatePlanSelected($plan)) {
            return view('/plans/viewplans', [
                'plan' => $plan,
                'inputs' => json_decode($plan->inputs),
                'result' => json_decode($plan->results),
                'agent' => $agent
            ]);
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function exportExcel($id) {
        $plan = Plan::find($id);

        if ($this->evaluatePlanSelected($plan)) {
            $date = new DateTime();
            return Excel::download(new PlanExcelExport($plan), trans('messages.profitability') . '-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.xlsx');
        } else {
            return Redirect::to('/404');
        }
    }

    public function exportPdf($id) {
        $plan = Plan::find($id);

        if ($this->evaluatePlanSelected($plan)) {
            $date = new DateTime();

            $pdf = new PlanPdfExport($plan);
            $doc = $pdf->export();

            return $doc->download(trans('messages.profitability') . '-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.pdf');
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan) {
        if ($this->evaluatePlanSelected($plan)) {
            $plan->delete();
            return Redirect::to('/plans')->withSuccessMessage(trans('messages.project_deleted'));
        } else {
            return Redirect::to('/404');
        }
    }

    /**
     * Understand what plans to load based on the role of the user.
     */
    private function evaluatePlans() {
        if (Auth::user()->roles[0]->id == Constants::ROLE_ADMIN_ID) {
            $plans = Plan::whereHas('user', function (Builder $query) {
                    $query->where('deleted_at', '=', null);
                })->with('user')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if (Auth::user()->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            $plans = Plan::whereHas('user', function (Builder $query) {
                    $query->where('user_related_id', '=', Auth::user()->id)->where('deleted_at', '=', null);
                })->orWhere('user_id', '=', Auth::user()->id)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $plans = Plan::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }

        return $plans;
    }

    /**
     * Check if the plan selected fits to the roles of the users.
     */
    private function evaluatePlanSelected($plan) {
        if (Auth::user()->roles[0]->id == Constants::ROLE_ADMIN_ID) {
            if ($plan->user != null) return true;
            else return false;
        } else if (Auth::user()->roles[0]->id == Constants::ROLE_INSTITUTION_ID) {
            $userIds = array();
            array_push($userIds, Auth::user()->id);
            $users = User::where('user_related_id', '=', Auth::user()->id)->get();

            foreach ($users as $user) {
                array_push($userIds, $user->id);
            }

            if (in_array($plan->user_id, $userIds)) return true;
            else return false;
        } else {
            if ($plan->user_id == Auth::user()->id) return true;
            else return false;
        }
    }
}
