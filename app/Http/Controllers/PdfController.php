<?php

namespace App\Http\Controllers;
use DB;
use PDF;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    function index()
    {
        $data = DB::table('catatan')->get();
        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->download('laporan.pdf');
    }
}
