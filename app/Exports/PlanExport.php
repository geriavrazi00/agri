<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PlanExport implements FromView, ShouldAutoSize, WithDrawings
{
	private $plan;

    public function __construct($plan) {
        $this->plan = $plan;
    }

    public function view(): View {
        return view('exports/excel/planexport', [
        	'input' => json_decode($this->plan->inputs),
            'result' => json_decode($this->plan->results),
            'applicant' => $this->plan->applicant,
            'date' => $this->plan->created_at,
        ]);
    }

    public function drawings() {
        $drawing = new Drawing();
        $drawing->setName('AASF Logo');
        $drawing->setDescription('AASF Logo');
        $drawing->setPath(public_path('/img/logo/aasf.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');

        return $drawing;
    }
}
