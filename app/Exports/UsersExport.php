<?php
namespace App\Exports;

use App\Invoice;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function view(): View
    {
        return view('students.export', [
            'students' => Student::all()
        ]);
    }
}
