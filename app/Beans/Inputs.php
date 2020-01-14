<?php

namespace App\Beans;

class Inputs {
	private $applicantName;
	private $farmCategory;
	private $investmentPlans;
	private $investmentLabels;
	private $businessData;
	private $businessLabels;
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

	public function setInvestmentLabels($investmentLabels) {
		$this->investmentLabels = $investmentLabels;
	}

	public function getInvestmentLabels() {
		return $this->investmentLabels;
	}

	public function setBusinessData($businessData) {
		$this->businessData = $businessData;
	}

	public function getBusinessData() {
		return $this->businessData;
	}

	public function setBusinessLabels($businessLabels) {
		$this->businessLabels = $businessLabels;
	}

	public function getBusinessLabels() {
		return $this->businessLabels;
	}

	public function setLoanData($loanData) {
		$this->loanData = $loanData;
	}

	public function getLoanData() {
		return $this->loanData;
	}

	public function convertToJson() {
		$data = array();

		$data["applicantName"] = $this->getApplicantName();
        $data["farmCategory"] = $this->getFarmCategory();
        $data["investmentPlans"] = $this->getInvestmentPlans();
        $data["investmentLabels"] = $this->getInvestmentLabels();
        $data["businessData"] = $this->getBusinessData();
        $data["businessLabels"] = $this->getBusinessLabels();
        $data["loanData"] = $this->getLoanData();

        return $data;
	}
}
