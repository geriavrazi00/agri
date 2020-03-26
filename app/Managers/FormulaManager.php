<?php

namespace App\Managers;

use App\Constants;
use App\Category;
use App\Culture;
use App\Tax;
use App\Value;
use App\Beans\Inputs;
use App\Beans\Result;
use Log;

class FormulaManager {

    public function buildInputs($request) {
        $selectedCategories = explode(',', $request->get('selected-categories')[0]);
        $loanVariableNr = Constants::LOAN_FIELDS;
        $loanColumns = Constants::LOAN_COLUMNS;
        $inputs = array();

        foreach($selectedCategories as $categoryId) {
            $selectedCategory = Category::find($categoryId);

            $investmentLabelObjects = $selectedCategory->labels->where('type', '=', Constants::INVESTMENT_LABELS);
            $businessLabelObjects = $selectedCategory->labels->where('type', '=', Constants::BUSINESS_LABELS);
            $investmentLabels = array();
            $investmentLabelsExtra = array();
            $businessLabels = array();
            $extraInvestments = array();

            foreach ($investmentLabelObjects as $key => $labels) {
                array_push($investmentLabels, $labels->value);
                array_push($investmentLabelsExtra, $labels->extra_data);
            }

            foreach ($businessLabelObjects as $key => $labels) {
                array_push($businessLabels, $labels->value);
            }

            $investmentVariableNr = sizeof($investmentLabels);
            $businessVariableNr = sizeof($businessLabels);

            array_push($investmentLabels, 'messages.total'); // On the reading side of these data, all the labels are translated at runtime. Passing an already translated message, would leave the message static

            $input = new Inputs();
            $input->setApplicantName($request->get('applicant-name'));
            $input->setBusinessCode($request->get('business-code'));
            $input->setFarmCategory($selectedCategory);
            $input->setInvestmentLabels($investmentLabels);
            $input->setInvestmentLabelsExtra($investmentLabelsExtra);
            $input->setBusinessLabels($businessLabels);

            $totalValuePlans = array();
            $investmentPlans = array();
            $allBusinessData = array();
            $allLoanData = array();

            for($i = 0; $i < $selectedCategory->option_number; $i++) {
                $totalValuePlan = array();
                $investmentPlan = array();
                $businessData = array();
                $extraInvestment = array();
                $totalInvestment = 0;
                $totalOfTotalValue = 0;
                $totalExtraInvestment = 0;

                for($j = 0; $j < $investmentVariableNr; $j++) {
                    $totalValue = $request->get('investment-0-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float) $this->removeFormat($request->get('investment-0-' . $j . '-' . $i . '-' . $selectedCategory->id));
                    $value = $request->get('investment-1-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float) $this->removeFormat($request->get('investment-1-' . $j . '-' . $i . '-' . $selectedCategory->id));

                    $totalInvestment += $value;
                    $totalOfTotalValue += $totalValue;
                    $totalExtraInvestment += $request->get('investment-extra-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float) $this->removeFormat($request->get('investment-extra-' . $j . '-' . $i . '-' . $selectedCategory->id));

                    array_push($totalValuePlan, $totalValue);
                    array_push($investmentPlan, $value);
                }

                array_push($totalValuePlan, $totalOfTotalValue);
                array_push($investmentPlan, $totalInvestment);
                array_push($extraInvestment, $totalExtraInvestment);

                for($j = 0; $j < $businessVariableNr; $j++) {
                    if($j == 0) {
                        $value = $request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float) $this->removeFormat($request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id));
                    } else {
                        $value = $request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id) == null ? 0 : (float)$request->get('business-' . $j . '-' . $i . '-' . $selectedCategory->id);
                    }

                    array_push($businessData, $value);
                }

                array_push($totalValuePlans, $totalValuePlan);
                array_push($investmentPlans, $investmentPlan);
                array_push($extraInvestments, $extraInvestment);
                array_push($allBusinessData, $businessData);
            }

            for($i = 0; $i < $loanColumns; $i++) {
                $loanData = array();

                array_push($loanData, $this->removeFormat($request->get('total-loan-' . $i)));

                for($j = 0; $j < $loanVariableNr; $j++) {
                    $value = $request->get('loan-' . $j . '-' . $i) == null ? 0 : $request->get('loan-' . $j . '-' . $i);
                    array_push($loanData, $value);
                }

                array_push($allLoanData, $loanData);
            }

            $input->setTotalValuePlans($totalValuePlans);
            $input->setInvestmentPlans($investmentPlans);
            $input->setBusinessData($allBusinessData);
            $input->setLoanData($allLoanData);
            $input->setExtraInvestments($extraInvestments);

            array_push($inputs, $input);
        }

    	return $inputs;
    }

    public function calculateResult($inputs) {
    	$result = new Result();
    	$cultures = array();

    	$totalIncome = 0;
    	$totalExpense = 0;
    	$totalAmortization = 0;

        foreach($inputs as $input) {
            //Amortization values
            $amortizationConstants = $input->getFarmCategory()->labels()->where('type', '=', Constants::INVESTMENT_LABELS)->get();

            //The amortization is calculated using the first column of the investment plan table. The brute income uses the second
            for($i = 0; $i < sizeof($input->getTotalValuePlans()); $i++) {
                for($j = 0; $j < sizeof($amortizationConstants); $j++) {
                    $totalAmortization += $amortizationConstants[$j]->amortization != 0
                        ? $input->getTotalValuePlans()[$i][$j]/$amortizationConstants[$j]->amortization
                        : 0;
                }
            }

            for($i = 0; $i < sizeof($input->getBusinessData()); $i++) {
                for($j = 0; $j < $input->getFarmCategory()->culture_number; $j++) {
                    $culture = array();

                    if($input->getBusinessData()[$i][$j+2] == 'null') continue;

                    $selectedCulture = Culture::find($input->getBusinessData()[$i][$j+2]);

                    $valuesCulture = Value::where('technology_id', '=', $input->getBusinessData()[$i][1])
                        ->where('culture_id', '=', $selectedCulture->id)
                        ->first();

                    $extraInvestment = $input->getExtraInvestments()[$i][0];
                    $mainVariable = $input->getBusinessData()[$i][0] + $extraInvestment;

                    $income = $valuesCulture->efficiency * $valuesCulture->price * $mainVariable;
                    $expenses = $valuesCulture->efficiency * $valuesCulture->cost * $mainVariable;

                    $multiplicationValue = 0;

                    if($valuesCulture->multiply_by_production) {
                        $multiplicationValue = $valuesCulture->efficiency * $mainVariable;
                    } else {
                        $multiplicationValue = $mainVariable;
                    }

                    array_push($culture, $selectedCulture->name);
                    array_push($culture, $input->getFarmCategory()->name);
                    array_push($culture, $mainVariable);
                    array_push($culture, $valuesCulture->efficiency);
                    array_push($culture, $valuesCulture->efficiency * $mainVariable);
                    array_push($culture, $valuesCulture->price);
                    array_push($culture, $mainVariable != 0 ? $income/$mainVariable : 0);
                    array_push($culture, $mainVariable != 0 ? (($income/$mainVariable) * $multiplicationValue) : 0);
                    array_push($culture, $expenses);

                    array_push($cultures, $culture);

                    $totalIncome += $income;
                    $totalExpense += $expenses;
                }
            }
        }

        $firstYearCredit = 0;
        $yearlyInterest = 0;

        /* To adapt to the new column of the loan table, in the loop below I included only the values that were directly touched
        by the loan data and made the sum of those data. The other values are calculated as they were before. */
        for($i = 0; $i < Constants::LOAN_COLUMNS; $i++) {
            if($inputs[0]->getLoanData()[$i][0] != 0) {
                //Credit
                $credit = $this->calculateCredit($inputs[0]->getLoanData()[$i][1]/100, $inputs[0]->getLoanData()[$i][2], $inputs[0]->getLoanData()[$i][3], $inputs[0]->getLoanData()[$i][0]);

                $fullInterest = array_sum($credit["paymentsPerYear"]);
                $yearlyInterest +=  $inputs[0]->getLoanData()[$i][2] != 0 ? $fullInterest / $inputs[0]->getLoanData()[$i][2] : 0;
                $firstYearCredit += $credit["firstYearCredit"];
            }
        }

        $incomeBeforeTax = $totalIncome - $totalExpense - $totalAmortization - $yearlyInterest;

        if($incomeBeforeTax < 0 ) {
            $incomeTax = 0;
        } else {
            $tax = $this->calculateTax($totalIncome);
            $incomeTax = $incomeBeforeTax * $tax;
        }

        $totalNetIncome = $incomeBeforeTax - $incomeTax;
        $moneyFlux = $totalIncome - $totalExpense - $incomeTax;

        $dscr = $firstYearCredit != 0 ? $moneyFlux / $firstYearCredit : 0;

        //Setting final results
    	$result->setCultures($cultures);
    	$result->setTotalIncome($totalIncome);
    	$result->setTotalExpense($totalExpense);
        $result->setTotalAmortization($totalAmortization);
        $result->setIncomeBeforeTax($incomeBeforeTax);
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

        $rate = $yearlyPayments != 0 ? $interest / $yearlyPayments : 0;
        $nper = $years * $yearlyPayments;
        $pv = -$loan;
        $fv = 0;
        $type = 0;
        $PMT = $rate != 0 ? (-$fv - $pv * pow(1 + $rate, $nper)) / (1 + $rate * $type) / ((pow(1 + $rate, $nper) - 1) / $rate) : 0;

        $yearlyInterestSums = 0;

        $countYearlyPayments = 0;
        $paymentsPerYear = array();

        for($i = 0; $i < $nper; $i++) {
            $calculatedInterest = $yearlyPayments != 0 ? ($loan * $interest) / $yearlyPayments : 0;
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

    private function calculateTax($totalIncome) {
        $allTaxes = Tax::count();

        if($allTaxes > 0) {
            $tax = Tax::where('bottom_threshold', '<=', $totalIncome)
                ->where(function($query) use ($totalIncome) {
                    $query->where('top_threshold', '>', $totalIncome);
                    $query->orWhere('top_threshold', '=', null);
                })->first();

            return $tax->percentage/100;
        } else {
            if($totalIncome >= 0 && $totalIncome < Constants::LOW_THRESHOLD) {
                return 0;
            } else if($totalIncome >= Constants::LOW_THRESHOLD && $totalIncome < Constants::HIGH_THRESHOLD) {
                return Constants::LOW;
            } else if($totalIncome >= Constants::HIGH_THRESHOLD) {
                return Constants::HIGH;
            } else {
                return 0;
            }
        }
    }

    public function addFormat($number) {
        return number_format($number, 2, ".", ",");
    }

    public function removeFormat($number) {
        return str_replace(",", "", $number);
    }
}
