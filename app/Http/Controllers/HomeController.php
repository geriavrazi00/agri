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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        //$this->calculateValues();

        $categories = Category::all();
        $technologies = Technology::all();
        $cultures = Culture::all();
        $selectedCategory = null;

        return view('home', compact('categories', 'technologies', 'cultures', 'selectedCategory'));
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

    private function calculateValues() {
        //First table
        $greenHouse = 1000000;
        $plastic = 500000;
        $water = 100000;
        $farming = 0; 
        $other = 0;

        //Second table
        $surface = 3;
        $technology = 2;
        $culture1 = 4; 
        $culture2 = 1;

        //Third table
        $years = 5;
        $interest = 0.12;
        $yearlyPayments = 12;

        //Amortization values
        $greenHouseYears = 20;
        $plasticYears = 5;
        $waterYears = 10;

        //Taxes
        $low = 0.075;
        $high = 0.15;
        $threshold = 12000000;

        $totalBrute = $greenHouse + $plastic + $water + $farming + $other;
        $valuesCulture1 = Value::where('technology_id', '=', $technology)
            ->where('culture_id', '=', $culture1)
            ->first();
        $valuesCulture2 = Value::where('technology_id', '=', $technology)
            ->where('culture_id', '=', $culture2)
            ->first();

        $income1 = $valuesCulture1->efficiency * $valuesCulture1->price * $surface;
        $income2 = $valuesCulture2->efficiency * $valuesCulture2->price * $surface;

        $expenses1 = $valuesCulture1->efficiency * $valuesCulture1->cost * $surface;
        $expenses2 = $valuesCulture2->efficiency * $valuesCulture2->cost * $surface;

        $profit1 = $income1 - $expenses1;
        $profit2 = $income2 - $expenses2;

        //Amortization
        $greenHouseAmortization = $greenHouse / $greenHouseYears;
        $plasticAmortization = $plastic / $plasticYears;
        $waterAmortization = $water / $waterYears;

        //Credit
        $credit = $this->calculateCredit($interest, $years, $yearlyPayments, $totalBrute);
        
        Log::info($income1);
        Log::info($income2);

        Log::info("Siperfaqe -> " . $surface);
        Log::info("Rendimenti 1 -> " . $valuesCulture1->efficiency);
        Log::info("Rendimenti 2 -> " . $valuesCulture2->efficiency);
        Log::info("Prodhimi 1 -> " . ($valuesCulture1->efficiency * $surface));
        Log::info("Prodhimi 2 -> " . ($valuesCulture2->efficiency * $surface));
        Log::info("Te ardhurat bruto per njesi 1 -> " . $income1/$surface);
        Log::info("Te ardhurat bruto per njesi 2 -> " . $income2/$surface);
        Log::info("Te ardhurat bruto totale 1 -> " . ($income1/$surface) * $surface);
        Log::info("Te ardhurat bruto totale 2 -> " . ($income2/$surface) * $surface);
        Log::info("Shpenzime prodhimi 1 -> " . $expenses1);
        Log::info("Shpenzime prodhimi 2 -> " . $expenses2);

        Log::info("space");
        
        $totalIncome = $income1 + $income2;
        $totalExpense = $expenses1 + $expenses2;
        $totalAmortization = $greenHouseAmortization + $plasticAmortization + $waterAmortization;
        
        $fullInterest = array_sum($credit["paymentsPerYear"]);
        $yearlyInterest = $fullInterest / $years;

        $tax = $low; 
        if($totalIncome >= $threshold) $tax = $high;

        Log::info("TAX: " . $tax);

        $incomeTax = ($totalIncome - $totalExpense - $totalAmortization - $yearlyInterest) * $tax;
        $totalNetIncome = $totalIncome - $totalExpense - $totalAmortization - $yearlyInterest - $incomeTax;
        $moneyFlux = $totalIncome - $totalExpense - $incomeTax;
        $firstYearCredit = $credit["firstYearCredit"];
        $dscr = $moneyFlux / $firstYearCredit;

        Log::info("Totali i te ardhurave viti 1 -> " . $totalIncome);
        Log::info("Shpenzime prodhimi totale ne ferme -> " . $totalExpense);
        Log::info("Amortizimi stalles -> " . $totalAmortization);
        Log::info("Interesi vjetor -> " . $yearlyInterest);
        Log::info("Tatimi mbi fitimin (mesatarisht 7.5%) -> " . $incomeTax);
        Log::info("Fitimi neto total (leke) -> " . $totalNetIncome);
        Log::info("Fluksi i parase i vlefshem per pagesa kredie -> " . $moneyFlux);
        Log::info("Keste kredie per 1 vit -> " . $firstYearCredit);
        Log::info("DSCR (Debt Service Coverage Ratio) -> " . $dscr);
    }

    private function calculateCredit($interest, $years, $yearlyPayments, $loan) {
        $totalInterest = 0;

        $rate = $interest / $yearlyPayments;
        $nper = $years * $yearlyPayments;
        $pv = -$loan;
        $fv = 0;
        $type = 0;
        $PMT = (-$fv - $pv * pow(1 + $rate, $nper)) / (1 + $rate * $type) / ((pow(1 + $rate, $nper) - 1) / $rate);

        $yearlyInterestSums = 0;

        $countYearlyPayments = 0;
        $paymentsPerYear = array();

        for($i = 0; $i < $nper; $i++) {
            $calculatedInterest = ($loan * $interest) / $yearlyPayments;
            $principal = $PMT - $calculatedInterest;
            $loan = $loan - $principal;
            $totalInterest = $totalInterest + $calculatedInterest;

            $countYearlyPayments++;
            $yearlyInterestSums = $yearlyInterestSums + $calculatedInterest;

            if($countYearlyPayments == $yearlyPayments) {
                array_push($paymentsPerYear, round($yearlyInterestSums));
                $yearlyInterestSums = 0;
                $countYearlyPayments = 0;
            }
        }

        $firstYearCredit = $PMT * $yearlyPayments;

        $credit["firstYearCredit"] = $firstYearCredit;
        $credit["paymentsPerYear"] = $paymentsPerYear;

        return $credit;
    }
}
