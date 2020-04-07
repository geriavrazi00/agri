<?php

namespace App\Http\Controllers;

use App\Category;
use App\Managers\FormulaManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use Redirect;

class ValuesController extends Controller
{
    protected $formulaManager;

    public function __construct(FormulaManager $formulaManager) {
        parent::__construct();
        // Fetch the Formula Manager object
        $this->formulaManager = $formulaManager;

        $this->middleware('permission:coefficient-list|coefficient-edit', ['only' => ['index','show']]);
        $this->middleware('permission:coefficient-edit', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::orderBy('name')->get();
        return view('/admin/values/valueslist', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view ('/admin/values/viewvalues', ['category' => Category::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view ('/admin/values/editvalues', [
            'category' => Category::find($id),
            'formulaManager' => $this->formulaManager
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $category = Category::find($id);

        foreach ($category->cultures as $culture) {
            foreach ($culture->values  as $value) {
                $value->efficiency = $this->formulaManager->removeFormat($request->get('efficiency-' . $culture->id . '-' . $value->id));
                $value->price = $this->formulaManager->removeFormat($request->get('price-' . $culture->id . '-' . $value->id));
                $value->cost = $this->formulaManager->removeFormat($request->get('cost-' . $culture->id . '-' . $value->id));
                $value->save();
            }
        }

        return Redirect::to('/values')->withSuccessMessage(trans('messages.coefficients_updated'));
    }
}
