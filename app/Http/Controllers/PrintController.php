<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Catatan;

class PrintController extends Controller
{
      public function index()
      {
            $catatan = Catatan::all();
            return view('printstudent')->with('catatan', $catatan);;
      }
      public function prnpriview()
      {
            $catatan = Catatan::all();
            return view('catatan')->with('catatan', $catatan);;
      }
}