<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produk([
            'nama_produk' => $row['nama_karyawan'],
            'tanggal' => $row['tanggal'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_keluar' => $row['waktu_keluar'],
            'created_at' => $row['waktu_di_input'],
            'updated_at' => $row['waktu_di_edit']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
