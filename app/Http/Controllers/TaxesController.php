<?php

namespace App\Http\Controllers;

use App\Tax;
use App\Managers\FormulaManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Log;
use Jenssegers\Agent\Agent;

class TaxesController extends Controller
{
    protected $formulaManager;

    public function __construct(FormulaManager $formulaManager) {
        parent::__construct();
        // Fetch the Formula Manager object
        $this->formulaManager = $formulaManager;

        $this->middleware('permission:tax-list|tax-create|tax-edit|tax-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tax-create', ['only' => ['create','store']]);
        $this->middleware('permission:tax-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tax-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $taxes = Tax::all();
        return view('/admin/taxes/taxeslist', compact('taxes'));
    }

    /**
     * Validate the incoming requests.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request) {
        $request['bottom-threshold'] = $this->formulaManager->removeFormat($request['bottom-threshold']) + 0;
        $request['top-threshold'] = $request['top-threshold'] != '' ? $this->formulaManager->removeFormat($request['top-threshold']) + 0 : null;

        return $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'bottom-threshold' => ['required', 'numeric', 'digits_between:1,16'],
            'top-threshold' => ['nullable', 'numeric', 'digits_between:0,16'],
            'percentage' => ['numeric', 'max:100', 'between:0,100.0000'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $agent = new Agent();

        return view('/admin/taxes/createtaxes', [
            'formulaManager' => $this->formulaManager,
            'agent' => $agent
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

        Tax::create([
            'name' => $request->get('name'),
            'bottom_threshold' => $request->get('bottom-threshold'),
            'top_threshold' => $request->get('top-threshold'),
            'percentage' => $request->get('percentage'),
        ]);

        return Redirect::to('/taxes')->withSuccessMessage(trans('messages.tax_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax) {
        return view('/admin/taxes/viewtaxes', [
            'tax' => $tax
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax) {
        $agent = new Agent();

        return view('/admin/taxes/edittaxes', [
            'tax' => $tax,
            'formulaManager' => $this->formulaManager,
            'agent' => $agent
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax) {
        $this->validator($request);

        $tax->name = $request->get('name');
        $tax->bottom_threshold = $request->get('bottom-threshold');
        $tax->top_threshold = $request->get('top-threshold');
        $tax->percentage = $request->get('percentage');

        $tax->save();
        return Redirect::to('/taxes')->withSuccessMessage(trans('messages.tax_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax) {
        $tax->delete();
        return Redirect::to('/taxes')->withSuccessMessage(trans('messages.tax_deleted'));
    }
}
