<?php

namespace App\Beans;

class Result {
	private $cultures;
	private $totalIncome;
	private $totalExpense;
	private $totalAmortization;
	private $yearlyInterest;
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
}