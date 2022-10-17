<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    //
    function index(){
        return view('returns');
    }
}
