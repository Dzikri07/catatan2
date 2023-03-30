<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AksesorisController extends Controller
{
    public function index(){
        return view('aksesoris.index');
    }
}
