<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BajuController extends Controller
{
    public function index(){
        return view('baju.index');
    }
}
