<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Log;
use Redirect;

class ValuesController extends Controller
{
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
        return view ('/admin/values/editvalues', ['category' => Category::find($id)]);
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
                $value->efficiency = $request->get('efficiency-' . $culture->id . '-' . $value->id);
                $value->price = $request->get('price-' . $culture->id . '-' . $value->id);
                $value->cost = $request->get('cost-' . $culture->id . '-' . $value->id);
                $value->save();
            }
        }

        return Redirect::to('/values')->withSuccessMessage('Koefiçentët e kategorisë u përditësuan me sukses!');
    }
}
