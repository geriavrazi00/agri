<?php

namespace App\Beans;

class Inputs {
	private $applicantName;
	private $farmCategory;
	private $investmentPlans;
	private $businessData;
	private $loanData;

	public function setApplicantName($applicantName) {
		$this->applicantName = $applicantName;
	}

	public function getApplicantName() {
		return $this->applicantName;
	}

	public function setFarmCategory($farmCategory) {
		$this->farmCategory = $farmCategory;
	}

	public function getFarmCategory() {
		return $this->farmCategory;
	}

	public function setInvestmentPlans($investmentPlans) {
		$this->investmentPlans = $investmentPlans;
	}

	public function getInvestmentPlans() {
		return $this->investmentPlans;
	}

	public function setBusinessData($businessData) {
		$this->businessData = $businessData;
	}

	public function getBusinessData() {
		return $this->businessData;
	}

	public function setLoanData($loanData) {
		$this->loanData = $loanData;
	}

	public function getLoanData() {
		return $this->loanData;
	}
}