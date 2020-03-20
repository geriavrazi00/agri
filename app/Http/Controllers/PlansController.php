<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Log;
use Redirect;
use App\Plan;

use App\Exports\PlanExcelExport;
use App\Exports\PlanPdfExport;
use Maatwebsite\Excel\Facades\Excel;
use Jenssegers\Agent\Agent;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $plans = Plan::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
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

        return view('/plans/viewplans', [
            'plan' => $plan,
            'inputs' => json_decode($plan->inputs),
            'result' => json_decode($plan->results),
            'agent' => $agent
        ]);
    }

    public function edit(Plan $plan) {
        return view('/plans/viewplans', [
            'plan' => $plan,
            'inputs' => json_decode($plan->inputs),
            'result' => json_decode($plan->results)
        ]);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function exportExcel($id) {
        $plan = Plan::find($id);
        $date = new DateTime();
        return Excel::download(new PlanExcelExport($plan), trans('messages.profitability') . '-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.xlsx');
    }

    public function exportPdf($id) {
        $plan = Plan::find($id);
        $date = new DateTime();

        $pdf = new PlanPdfExport($plan);
        $doc = $pdf->export();

        return $doc->download(trans('messages.profitability') . '-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan) {
        $plan->delete();
        return Redirect::to('/plans')->withSuccessMessage(trans('messages.project_deleted'));
    }
}
