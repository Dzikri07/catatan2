<?php

namespace App\Exports;

use App\Models\catatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class CatatanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return catatan::all();
    }
}
