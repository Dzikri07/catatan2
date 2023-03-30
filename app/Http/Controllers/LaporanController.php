<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\CatatanController;
use App\Models\Catatan;

class laporanController extends Controller
{
    public function index(request $request)
    {   $data['laporan'] = catatan::all();
        return view('catatan.laporan')->with($data);
    }

    public function cetak(){
        $data['catatan'] = Catatan::get();
        return view('catatan.cetak')->with($data);
    }
}
