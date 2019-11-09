<?php

namespace App\Beans;

class BusinessData {
	private $loan;
	private $yearlyInterest;
	private $settlementYears;
	private $yearlyPayments;
	private $firstPaymentDate;

	public function setLoan($loan) {
		$this->loan = $loan;
	}

	public function getLoan() {
		return $this->loan;
	}

	public function setYearlyInterest($yearlyInterest) {
		$this->yearlyInterest = $yearlyInterest;
	}

	public function getYearlyInterest() {
		return $this->yearlyInterest;
	}

	public function setSettlementYears($settlementYears) {
		$this->settlementYears = $settlementYears;
	}

	public function getSettlementYears() {
		return $this->settlementYears;
	}

	public function setYearlyPayments($yearlyPayments) {
		$this->yearlyPayments = $yearlyPayments;
	}

	public function getYearlyPayments() {
		return $this->yearlyPayments;
	}

	public function setFirstPaymentDate($firstPaymentDate) {
		$this->firstPaymentDate = $firstPaymentDate;
	}

	public function getFirstPaymentDate() {
		return $this->firstPaymentDate;
	}
}