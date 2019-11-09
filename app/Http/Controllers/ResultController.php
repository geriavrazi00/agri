<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Constants;
use App\Culture;
use App\Value;

use App\Beans\Inputs;
use App\Beans\Result;

use Log;

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
    	$inputs = $this->buildInputs($request);
    	$result = $this->calculateResult($inputs);

    	return view('result', compact('inputs', 'result'));
    }

    private function buildInputs($request) {
    	$selectedCategory = Category::find($request->get('farm-type'));
    	$investmentVariableNr = sizeof($selectedCategory->labels->where('type', '=', Constants::INVESTMENT_LABELS));
    	$businessVariableNr = sizeof($selectedCategory->labels->where('type', '=', Constants::BUSINESS_LABELS));
    	$loanVariableNr = sizeof($selectedCategory->labels->where('type', '=', Constants::LOAN_LABELS));

    	$inputs = new Inputs();
    	$inputs->setApplicantName($request->get('applicant-name'));
    	$inputs->setFarmCategory($selectedCategory);

    	$investmentPlans = array();
    	$allBusinessData = array();
    	$allLoanData = array();

    	for($i = 0; $i < $selectedCategory->option_number; $i++) {
    		$investmentPlan = array();
    		$businessData = array();
    		$totalInvestment = 0;

    		for($j = 0; $j < $investmentVariableNr; $j++) {
    			$value = $request->get('investment-' . $j . '-' . $i) == null ? 0 : (float)$request->get('investment-' . $j . '-' . $i);
    			$totalInvestment += $value;
    			array_push($investmentPlan, $value);
    		}

    		array_push($investmentPlan, $totalInvestment);

    		for($j = 0; $j < $businessVariableNr; $j++) {
    			$value = $request->get('business-' . $j . '-' . $i) == null ? 0 : (float)$request->get('business-' . $j . '-' . $i);
    			array_push($businessData, $value);
    		}

    		array_push($investmentPlans, $investmentPlan);
    		array_push($allBusinessData, $businessData);
    	}

    	for($i = 0; $i < $loanVariableNr; $i++) {
    		$value = $request->get('loan-' . $i) == null ? 0 : $request->get('loan-' . $i);
    		array_push($allLoanData, $value);
    	}

    	$inputs->setInvestmentPlans($investmentPlans);
    	$inputs->setBusinessData($allBusinessData);
    	$inputs->setLoanData($allLoanData);

    	return $inputs;
    }

    private function calculateResult($inputs) {
    	$result = new Result();
    	$cultures = array();

    	$totalBruteIncome = 0;
    	$totalIncome = 0;
    	$totalExpense = 0;
    	$totalAmortization = 0;

    	//Amortization values.
        $amortizationConstants = $inputs->getFarmCategory()->labels()->where('type', '=', Constants::INVESTMENT_LABELS)->get();

        $amortizationConstant1 = $amortizationConstants[0]->amortization;
        $amortizationConstant2 = $amortizationConstants[1]->amortization;
        $amortizationConstant3 = $amortizationConstants[2]->amortization;
        $amortizationConstant4 = $amortizationConstants[3]->amortization;
        $amortizationConstant5 = $amortizationConstants[4]->amortization;

        for($i = 0; $i < sizeof($inputs->getInvestmentPlans()); $i++) {
        	//Amortization
        	$totalAmortization += $amortizationConstant1 != 0 ? $inputs->getInvestmentPlans()[$i][0]/$amortizationConstant1 : 0;
        	$totalAmortization += $amortizationConstant2 != 0 ? $inputs->getInvestmentPlans()[$i][1]/$amortizationConstant2 : 0;
        	$totalAmortization += $amortizationConstant3 != 0 ? $inputs->getInvestmentPlans()[$i][2]/$amortizationConstant3 : 0;
        	$totalAmortization += $amortizationConstant4 != 0 ? $inputs->getInvestmentPlans()[$i][3]/$amortizationConstant4 : 0;
        	$totalAmortization += $amortizationConstant5 != 0 ? $inputs->getInvestmentPlans()[$i][4]/$amortizationConstant5 : 0;

        	$totalBruteIncome += $inputs->getInvestmentPlans()[$i][0] + $inputs->getInvestmentPlans()[$i][1] + $inputs->getInvestmentPlans()[$i][2] + $inputs->getInvestmentPlans()[$i][3] + $inputs->getInvestmentPlans()[$i][4];
        }

        //Credit
        $credit = $this->calculateCredit($inputs->getLoanData()[0]/100, $inputs->getLoanData()[1], $inputs->getLoanData()[2], $totalBruteIncome);

       	$fullInterest = array_sum($credit["paymentsPerYear"]);
        $yearlyInterest = $fullInterest / $inputs->getLoanData()[1];

    	for($i = 0; $i < sizeof($inputs->getBusinessData()); $i++) {
    		for($j = 0; $j < $inputs->getFarmCategory()->culture_number; $j++) {
    			$culture = array();

    			$selectedCulture = Culture::find($inputs->getBusinessData()[$i][$j+2]);
    			Log::info($inputs->getBusinessData()[$i]);

    			$valuesCulture = Value::where('technology_id', '=', $inputs->getBusinessData()[$i][1])
		        	->where('culture_id', '=', $selectedCulture->id)
		            ->first();
		        $mainVariable = $inputs->getBusinessData()[$i][0];

		        $income = $valuesCulture->efficiency * $valuesCulture->price * $mainVariable;
		        $expenses = $valuesCulture->efficiency * $valuesCulture->cost * $mainVariable;

		        array_push($culture, $selectedCulture->name);
		        array_push($culture, $mainVariable);
		        array_push($culture, $valuesCulture->efficiency);
		        array_push($culture, $valuesCulture->efficiency * $mainVariable);
		        array_push($culture, $income/$mainVariable);
		        array_push($culture, ($income/$mainVariable) * $mainVariable);
		        array_push($culture, $expenses);

		        array_push($cultures, $culture);

		        $totalIncome += $income;
		        $totalExpense += $expenses;
    		}
    	}

    	$tax = Constants::LOW; 
        if($totalIncome >= Constants::THRESHOLD) $tax = Constants::HIGH;

        $incomeTax = ($totalIncome - $totalExpense - $totalAmortization - $yearlyInterest) * $tax;
        $totalNetIncome = $totalIncome - $totalExpense - $totalAmortization - $yearlyInterest - $incomeTax;
        $moneyFlux = $totalIncome - $totalExpense - $incomeTax;
        $firstYearCredit = $credit["firstYearCredit"];
        $dscr = $moneyFlux / $firstYearCredit;

        //Setting final results
    	$result->setCultures($cultures);
    	$result->setTotalIncome($totalIncome);
    	$result->setTotalExpense($totalExpense);
    	$result->setTotalAmortization($totalAmortization);
    	$result->setYearlyInterest($yearlyInterest);
    	$result->setIncomeTax($incomeTax);
    	$result->setTotalNetIncome($totalNetIncome);
    	$result->setMoneyFlux($moneyFlux);
    	$result->setFirstYearCredit($firstYearCredit);
    	$result->setDscr($dscr);

        return $result;
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


/*

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

        //Taxes
        $low = 0.075;
        $high = 0.15;
        $threshold = 12000000;

        $greenHouseAmortization = $greenHouse / $greenHouseYears;
        $plasticAmortization = $plastic / $plasticYears;
        $waterAmortization = $water / $waterYears;

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
        
        /*Log::info($income1);
        Log::info($income2);*/

       /* Log::info("Siperfaqe -> " . $surface);
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

        //Log::info("space");
        
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

*/
