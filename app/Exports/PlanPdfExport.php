<?php

namespace App\Exports;

use PDF;

class PlanPdfExport
{
    private $plan;

    public function __construct($plan) {
        $this->plan = $plan;
    }

    public function export() {
        return PDF::loadView('exports/pdf/planexport', [
            'input' => json_decode($this->plan->inputs),
            'result' => json_decode($this->plan->results),
            'applicant' => $this->plan->applicant,
            'businessCode' => $this->plan->business_code,
            'date' => $this->plan->created_at,
        ]);
    }
}
