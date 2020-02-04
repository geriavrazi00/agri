<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
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
        $categories = Category::orderBy('image')->get();
        $technologies = Technology::all();
        $categoriesData = $this->loadAllCategoryData($categories);

        Log::info(App::getLocale());
        //$agent = new Agent();

        return view('home', compact('categories', 'categoriesData', 'technologies'));
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
