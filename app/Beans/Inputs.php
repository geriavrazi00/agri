<?php

namespace App\Beans;

class Inputs {
    private $applicantName;
    private $businessCode;
	private $farmCategory;
	private $investmentPlans;
    private $investmentLabels;
    private $investmentLabelsExtra;
    private $totalValuePlans;
	private $businessData;
	private $businessLabels;
    private $loanData;
    private $extraInvestments;

	public function setApplicantName($applicantName) {
		$this->applicantName = $applicantName;
	}

	public function getApplicantName() {
		return $this->applicantName;
    }

    public function setBusinessCode($businessCode) {
		$this->businessCode = $businessCode;
	}

	public function getBusinessCode() {
		return $this->businessCode;
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

    public function setInvestmentLabelsExtra($investmentLabelsExtra) {
		$this->investmentLabelsExtra = $investmentLabelsExtra;
	}

	public function getInvestmentLabelsExtra() {
		return $this->investmentLabelsExtra;
    }

    public function setTotalValuePlans($totalValuePlans) {
        $this->totalValuePlans = $totalValuePlans;
    }

    public function getTotalValuePlans() {
        return $this->totalValuePlans;
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

    public function setExtraInvestments($extraInvestments) {
		$this->extraInvestments = $extraInvestments;
	}

	public function getExtraInvestments() {
		return $this->extraInvestments;
    }

	public function convertToJson() {
		$data = array();

        $data["applicantName"] = $this->getApplicantName();
        $data["businessCode"] = $this->getBusinessCode();
        $data["farmCategory"] = $this->getFarmCategory();
        $data["investmentPlans"] = $this->getInvestmentPlans();
        $data["investmentLabels"] = $this->getInvestmentLabels();
        $data["investmentLabelsExtra"] = $this->getInvestmentLabelsExtra();
        $data["totalValuePlans"] = $this->getTotalValuePlans();
        $data["businessData"] = $this->getBusinessData();
        $data["businessLabels"] = $this->getBusinessLabels();
        $data["loanData"] = $this->getLoanData();
        $data["extraInvestments"] = $this->getExtraInvestments();

        return $data;
	}
}
