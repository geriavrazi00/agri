<?php

namespace App\Managers;

use App\Constants;
use App\Category;
use App\Culture;
use App\Value;
use App\Beans\Inputs;
use App\Beans\Result;
use Log;

class FormulaManager {

    public function buildInputs($request) {
        $selectedCategories = explode(',', $request->get('selected-categories')[0]);
        $loanVariableNr = Constants::LOAN_FIELDS;
        $inputs = array();

        foreach($selectedCategories as $categoryId) {
            $selectedCategory = Category::find($categoryId);

            $investmentLabelObjects = $selectedCategory->labels->where('type', '=', Constants::INVESTMENT_LABELS);
            $businessLabelObjects = $selectedCategory->labels->where('type', '=', Constants::BUSINESS_LABELS);
            $investmentLabels = array();
            $businessLabels = array();

            foreach ($investmentLabelObjects as $key => $labels) {
                array_push($investmentLabels, $labels->value);
            }

            foreach ($businessLabelObjects as $key => $labels) {
                array_push($businessLabels, $labels->value);
            }

            $investmentVariableNr = sizeof($investmentLabels);
            $businessVariableNr = sizeof($businessLabels);

            array_push($investmentLabels, 'total');

            $input = new Inputs();
            $input->setApplicantName($request->get('applicant-name'));
            $input->setBusinessCode($request->get('business-code'));
            $input->setFarmCategory($selectedCategory);
            $input->setInvestmentLabels($investmentLabels);
            $input->setBusinessLabels($businessLabels);

            $totalValuePlans = array();
            $investmentPlans = array();
            $allBusinessData = array();
            $allLoanData = array();

            for($i = 0; $i < $selectedCategory->option_number; $i++) {
                $totalValuePlan = array();
                $investmentPlan = array();
                $businessData = array();
                $totalInvestment = 0;
                $totalOfTotalValue = 0;

                for($j = 0; $j < $investmentVariableNr; $j++) {
                    $totalValue = $request->get('investment-0-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float)$request->get('investment-0-' . $j . '-' . $i . '-' . $selectedCategory->id);
                    $value = $request->get('investment-1-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float)$request->get('investment-1-' . $j . '-' . $i . '-' . $selectedCategory->id);

                    $totalInvestment += $value;
                    $totalOfTotalValue += $totalValue;

                    array_push($totalValuePlan, $totalValue);
                    array_push($investmentPlan, $value);
                }

                array_push($totalValuePlan, $totalOfTotalValue);
                array_push($investmentPlan, $totalInvestment);

                for($j = 0; $j < $businessVariableNr; $j++) {
                    $value = $request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float)$request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id);
                    array_push($businessData, $value);
                }

                array_push($totalValuePlans, $totalValuePlan);
                array_push($investmentPlans, $investmentPlan);
                array_push($allBusinessData, $businessData);
            }

            for($i = 0; $i < $loanVariableNr; $i++) {
                $value = $request->get('loan-' . $i) == null ? 0 : $request->get('loan-' . $i);
                array_push($allLoanData, $value);
            }

            $input->setTotalValuePlans($totalValuePlans);
            $input->setInvestmentPlans($investmentPlans);
            $input->setBusinessData($allBusinessData);
            $input->setLoanData($allLoanData);

            array_push($inputs, $input);
        }

    	return $inputs;
    }

    public function calculateResult($inputs) {
    	$result = new Result();
    	$cultures = array();

    	$totalBruteIncome = 0;
    	$totalIncome = 0;
    	$totalExpense = 0;
    	$totalAmortization = 0;

        foreach($inputs as $input) {
            //Amortization values
            $amortizationConstants = $input->getFarmCategory()->labels()->where('type', '=', Constants::INVESTMENT_LABELS)->get();

            /*$amortizationConstant1 = $amortizationConstants[0]->amortization;
            $amortizationConstant2 = $amortizationConstants[1]->amortization;
            $amortizationConstant3 = $amortizationConstants[2]->amortization;
            $amortizationConstant4 = $amortizationConstants[3]->amortization;
            $amortizationConstant5 = $amortizationConstants[4]->amortization;*/

            for($i = 0; $i < sizeof($input->getInvestmentPlans()); $i++) {

                for($j = 0; $j < sizeof($amortizationConstants); $j++) {
                    $totalAmortization += $amortizationConstants[$j]->amortization != 0
                        ? $input->getInvestmentPlans()[$i][$j]/$amortizationConstants[$j]->amortization
                        : 0;

                    $totalBruteIncome += $input->getInvestmentPlans()[$i][$j];
                }

                //Amortization
                /*$totalAmortization += $amortizationConstant1 != 0 ? $input->getInvestmentPlans()[$i][0]/$amortizationConstant1 : 0;
                $totalAmortization += $amortizationConstant2 != 0 ? $input->getInvestmentPlans()[$i][1]/$amortizationConstant2 : 0;
                $totalAmortization += $amortizationConstant3 != 0 ? $input->getInvestmentPlans()[$i][2]/$amortizationConstant3 : 0;
                $totalAmortization += $amortizationConstant4 != 0 ? $input->getInvestmentPlans()[$i][3]/$amortizationConstant4 : 0;
                $totalAmortization += $amortizationConstant5 != 0 ? $input->getInvestmentPlans()[$i][4]/$amortizationConstant5 : 0;*/

                /*$totalBruteIncome += $input->getInvestmentPlans()[$i][0] + $input->getInvestmentPlans()[$i][1] + $input->getInvestmentPlans()[$i][2] + $input->getInvestmentPlans()[$i][3] + $input->getInvestmentPlans()[$i][4];*/
            }

            for($i = 0; $i < sizeof($input->getBusinessData()); $i++) {
                for($j = 0; $j < $input->getFarmCategory()->culture_number; $j++) {
                    $culture = array();

                    if($input->getBusinessData()[$i][$j+2] == 'null') continue;

                    $selectedCulture = Culture::find($input->getBusinessData()[$i][$j+2]);

                    $valuesCulture = Value::where('technology_id', '=', $input->getBusinessData()[$i][1])
                        ->where('culture_id', '=', $selectedCulture->id)
                        ->first();
                    $mainVariable = $input->getBusinessData()[$i][0];

                    $income = $valuesCulture->efficiency * $valuesCulture->price * $mainVariable;
                    $expenses = $valuesCulture->efficiency * $valuesCulture->cost * $mainVariable;

                    array_push($culture, $selectedCulture->name);
                    array_push($culture, $input->getFarmCategory()->name);
                    array_push($culture, $mainVariable);
                    array_push($culture, $valuesCulture->efficiency);
                    array_push($culture, $valuesCulture->efficiency * $mainVariable);
                    array_push($culture, $mainVariable != 0 ? $income/$mainVariable : 0);
                    array_push($culture, $mainVariable != 0 ? (($income/$mainVariable) * $mainVariable) : 0);
                    array_push($culture, $expenses);

                    array_push($cultures, $culture);

                    $totalIncome += $income;
                    $totalExpense += $expenses;
                }
            }
        }

        //Credit
        $credit = $this->calculateCredit($inputs[0]->getLoanData()[0]/100, $inputs[0]->getLoanData()[1], $inputs[0]->getLoanData()[2], $totalBruteIncome);

        $fullInterest = array_sum($credit["paymentsPerYear"]);
        $yearlyInterest = $fullInterest / $inputs[0]->getLoanData()[1];

    	$tax = Constants::LOW;
        if($totalIncome >= Constants::THRESHOLD) $tax = Constants::HIGH;

        $incomeTax = ($totalIncome - $totalExpense - $totalAmortization - $yearlyInterest) * $tax;
        $totalNetIncome = $totalIncome - $totalExpense - $totalAmortization - $yearlyInterest - $incomeTax;
        $moneyFlux = $totalIncome - $totalExpense - $incomeTax;
        $firstYearCredit = $credit["firstYearCredit"];
        $dscr = $firstYearCredit != 0 ? $moneyFlux / $firstYearCredit : 0;

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

/* OLD VERSION

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
