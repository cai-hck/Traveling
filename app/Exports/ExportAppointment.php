<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAppointment implements FromView
{
    public $appointment;
    public function view(): View
    {
        return view('company.excel', [
            'appointments' => $this->appointment
        ]);
    }
}