<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    function index(){
        $today = Sale::where('userid', auth()->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');
        $yesterday = Sale::where('userid', auth()->user()->id)->whereDate('created_at', Carbon::yesterday())->sum('amount');
        $sevendays  = Sale::where('userid', auth()->user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->sum('amount');
        $all = Sale::where('userid', auth()->user()->id)->sum('amount');

        
        $todayPUR = Purchase::where('userid', auth()->user()->id)->whereDate('created_at', Carbon::today())->sum('payable');
        $yesterdayPUR = Purchase::where('userid', auth()->user()->id)->whereDate('created_at', Carbon::yesterday())->sum('payable');
        $sevendaysPUR  = Purchase::where('userid', auth()->user()->id)->where('created_at', '>', Carbon::now()->subDays(7))->sum('payable');
        $allPUR = Purchase::where('userid', auth()->user()->id)->sum('payable');


        return view('home',compact('today','yesterday','sevendays','all','todayPUR','yesterdayPUR','sevendaysPUR','allPUR'));
    }
}
