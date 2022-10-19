<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    function index(){
        $products = Product::where(['userid'=>auth()->user()->id])->paginate(10);

        return view('stock',compact('products'))->with('i', (request()->input('page', 1) - 1) * 10);

    }
}
