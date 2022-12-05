<?php

namespace App\Exports;

use App\Models\DependenciaProfessor;
use Maatwebsite\Excel\Concerns\FromCollection;

class DependenciaProfessorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DependenciaProfessor::all();
    }
}
