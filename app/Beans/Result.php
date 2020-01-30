<?php

namespace App\Beans;

class Result {
	private $cultures;
	private $totalIncome;
	private $totalExpense;
	private $totalAmortization;
    private $yearlyInterest;
    private $incomeBeforeTax;
	private $incomeTax;
	private $totalNetIncome;
	private $moneyFlux;
	private $firstYearCredit;
	private $dscr;

	public function setCultures($cultures) {
		$this->cultures = $cultures;
	}

	public function getCultures() {
		return $this->cultures;
	}

	public function setTotalIncome($totalIncome) {
		$this->totalIncome = $totalIncome;
	}

	public function getTotalIncome() {
		return $this->totalIncome;
	}

	public function setTotalExpense($totalExpense) {
		$this->totalExpense = $totalExpense;
	}

	public function getTotalExpense() {
		return $this->totalExpense;
	}

	public function setTotalAmortization($totalAmortization) {
		$this->totalAmortization = $totalAmortization;
	}

	public function getTotalAmortization() {
		return $this->totalAmortization;
	}

	public function setYearlyInterest($yearlyInterest) {
		$this->yearlyInterest = $yearlyInterest;
	}

	public function getYearlyInterest() {
		return $this->yearlyInterest;
    }

    public function setIncomeBeforeTax($incomeBeforeTax) {
		$this->incomeBeforeTax = $incomeBeforeTax;
	}

	public function getIncomeBeforeTax() {
		return $this->incomeBeforeTax;
	}

	public function setIncomeTax($incomeTax) {
		$this->incomeTax = $incomeTax;
	}

	public function getIncomeTax() {
		return $this->incomeTax;
	}

	public function setTotalNetIncome($totalNetIncome) {
		$this->totalNetIncome = $totalNetIncome;
	}

	public function getTotalNetIncome() {
		return $this->totalNetIncome;
	}

	public function setMoneyFlux($moneyFlux) {
		$this->moneyFlux = $moneyFlux;
	}

	public function getMoneyFlux() {
		return $this->moneyFlux;
	}

	public function setFirstYearCredit($firstYearCredit) {
		$this->firstYearCredit = $firstYearCredit;
	}

	public function getFirstYearCredit() {
		return $this->firstYearCredit;
	}

	public function setDscr($dscr) {
		$this->dscr = $dscr;
	}

	public function getDscr() {
		return $this->dscr;
	}

	public function convertToJson() {
		$data = array();

		$data["cultures"] = $this->getCultures();
		$data["totalIncome"] = $this->getTotalIncome();
		$data["totalExpense"] = $this->getTotalExpense();
		$data["totalAmortization"] = $this->getTotalAmortization();
        $data["yearlyInterest"] = $this->getYearlyInterest();
        $data["incomeBeforeTax"] = $this->getIncomeBeforeTax();
		$data["incomeTax"] = $this->getIncomeTax();
		$data["totalNetIncome"] = $this->getTotalNetIncome();
		$data["moneyFlux"] = $this->getMoneyFlux();
		$data["firstYearCredit"] = $this->getFirstYearCredit();
		$data["dscr"] = $this->getDscr();

		return $data;
	}
}
