<?php

namespace App\Exports;

use App\Models\unite_enseignement;
use Maatwebsite\Excel\Concerns\FromCollection;

class Ues implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ues = unite_enseignement::orderBy('code','asc')->get();
        return $ues;
    }
}
