<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Constants;
use App\Culture;
use App\Technology;
use App\Value;

use Log;
use View;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $categories = Category::orderBy('name')->get();
        $selectedCategory = null;
        return view('home', compact('categories', 'selectedCategory'));
    }

    public function selectCategory(Request $request) {
        $categories = Category::all();
        $technologies = Technology::all();
        $cultures = Culture::all();
        $selectedCategory = null;

        $labels["investments"] = array();
        $labels["business"] = array();
        $labels["loans"] = array();

        if($request->selectedCategory != "null") {
            $selectedCategory = Category::find($request->selectedCategory);

            for($i = 0; $i < sizeof($selectedCategory->labels); $i++) {
                if($selectedCategory->labels[$i]->type == Constants::INVESTMENT_LABELS) {
                    array_push($labels["investments"], $selectedCategory->labels[$i]);
                } else if($selectedCategory->labels[$i]->type == Constants::BUSINESS_LABELS) {
                    array_push($labels["business"], $selectedCategory->labels[$i]);
                } else if($selectedCategory->labels[$i]->type == Constants::LOAN_LABELS) {
                    array_push($labels["loans"], $selectedCategory->labels[$i]);
                }
            }
        }

        return view('inputs', compact('categories', 'technologies', 'cultures', 'selectedCategory', 'labels'))->render();
    }
}
