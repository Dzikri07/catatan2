<?php

namespace App\Imports;

use App\Models\laporanBug;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanBugImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new laporanBug([
           
            'jenis' => $row['jenis_error'],
            'deskripsi' => $row['deskripsi'],
            'tgl_kejadian' => $row['tanggal_kejadian'],
            'pelapor' => $row['pelapor'],
            'status' => $row['status']
        ]);
    }
    public function headingRow(): int
    {
        return 3;
    }
}
