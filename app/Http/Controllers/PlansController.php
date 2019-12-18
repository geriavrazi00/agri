<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Log;
use Redirect;
use App\Plan;
use Illuminate\Http\Request;

use App\Exports\PlanExport;
use Maatwebsite\Excel\Facades\Excel;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $plans = Plan::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('/plans/planslist', compact('plans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan) {
        return view('/plans/viewplans', [
            'plan' => $plan,
            'result' => json_decode($plan->results)
        ]);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function export($id) {
        $plan = Plan::find($id);
        $date = new DateTime();
        return Excel::download(new PlanExport($plan), 'Përfitueshmëria-' . $plan->applicant . '-' . $date->format('d-m-Y-H-i-s') . '.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan) {
        $plan->delete();
        return Redirect::to('/plans')->withSuccessMessage('Plani u fshi me sukses!');
    }
}