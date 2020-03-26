<?php

namespace App\Http\Controllers;

use App\Category;
use App\Constants;
use App\Technology;
use Jenssegers\Agent\Agent;

use Log;

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
        $categories = Category::with(['labels', 'cultures'])->orderBy('image')->get();
        $technologies = Technology::all();
        $categoriesData = $this->loadAllCategoryData($categories);
        $agent = new Agent();

        return view('home', compact('categories', 'categoriesData', 'technologies', 'agent'));
    }

    private function loadAllCategoryData($categories) {
        $result = array();

        foreach ($categories as $key => $category) {
            $labels["investments"] = array();
            $labels["business"] = array();
            $labels["loans"] = array();

            for($i = 0; $i < sizeof($category->labels); $i++) {
                if($category->labels[$i]->type == Constants::INVESTMENT_LABELS) {
                    array_push($labels["investments"], $category->labels[$i]);
                } else if($category->labels[$i]->type == Constants::BUSINESS_LABELS) {
                    array_push($labels["business"], $category->labels[$i]);
                } else if($category->labels[$i]->type == Constants::LOAN_LABELS) {
                    array_push($labels["loans"], $category->labels[$i]);
                }
            }

            $result[$category->id] = $category;
            $result[$category->id]["investments"] = $labels["investments"];
            $result[$category->id]["business"] = $labels["business"];
            $result[$category->id]["loans"] = $labels["loans"];
        }

        return $result;
    }
}
