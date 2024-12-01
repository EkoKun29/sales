<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrakBaruController extends Controller
{
    public function index(){
        return view('kontrak.index');
    }
}
