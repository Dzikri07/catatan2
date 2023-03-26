<?php

namespace App\Imports;

use App\Models\catatan;
use Maatwebsite\Excel\Concerns\ToModel;

class CatatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new catatan([
            //
        ]);
    }
}
