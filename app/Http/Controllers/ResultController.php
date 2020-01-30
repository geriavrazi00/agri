<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Exports\PlanExcelExport;
use App\Exports\PlanPdfExport;
use App\Managers\FormulaManager;
use Maatwebsite\Excel\Facades\Excel;

use Auth;
use DateTime;
use Exception;
use Log;
use Redirect;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application calculations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {

        // try {
            $formulaManager = new FormulaManager();

            $inputs = $formulaManager->buildInputs($request);
            $result = $formulaManager->calculateResult($inputs);

            $applicant = $inputs[0]->getApplicantName();
            $businessCode = $inputs[0]->getBusinessCode();
            $date = $request->date;

            $inputs = $this->inputsToJson($inputs);

            return view('result', compact('inputs', 'result', 'date', 'applicant', 'businessCode'));
        // } catch(Exception $e) {
        //     Log::error($e);
        //     return view('errors/404');
        // }
    }

    public function savePlan(Request $request) {
        $plan = $this->createPlan($request->inputs, $request->result, $request->date);
        $plan->save();
        $this->attachCategoriesToPlan($plan, $request->inputs);

        return Redirect::to('/plans')->withSuccessMessage('Aplikimi u ruajt me sukses!');
    }

    public function exportExcel(Request $request) {
        $date = new DateTime();
        $plan = $this->createPlan($request->inputs, $request->result, $request->date);

        return Excel::download(new PlanExcelExport($plan), 'Përfitueshmëria-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.xlsx');
    }

    public function exportPdf(Request $request) {
        $date = new DateTime();
        $plan = $this->createPlan($request->inputs, $request->result, $request->date);

        $pdf = new PlanPdfExport($plan);
        $doc = $pdf->export();

        return $doc->download('Përfitueshmëria-' . $plan->business_code . '-' . $date->format('d-m-Y-H-i-s') . '.pdf');
    }

    private function createPlan($inputs, $result, $date) {
        $inputs = json_decode($inputs);

        $plan = new Plan();
        $plan->user_id = Auth::user()->id;
        $plan->applicant = $inputs[0]->applicantName;
        $plan->business_code = $inputs[0]->businessCode;
        $plan->inputs = json_encode($inputs);
        $plan->created_at = strtotime($date);
        $plan->results = $result;

        return $plan;
    }

    private function attachCategoriesToPlan($plan, $inputs) {
        $inputs = json_decode($inputs);
        $categoryIds = array();

        for ($i = 0; $i < sizeof($inputs); $i++) {
            array_push($categoryIds, $inputs[$i]->farmCategory->id);
        }

        $plan->categories()->attach($categoryIds);
        return $plan;
    }

    private function inputsToJson($inputs) {
        $in = array();

        for ($i = 0; $i < sizeof($inputs); $i++) {
            $in[$i] = $inputs[$i]->convertToJson();
        }

        return json_encode($in);
    }
}
