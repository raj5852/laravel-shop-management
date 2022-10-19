<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Selectproduct;
use Illuminate\Http\Request;

class ManagPurchaseController extends Controller
{
    //
    function index()
    {
        $purchase = Purchase::where('userid', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('managpurchase', compact('purchase'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    function details(Request $request)
    {
        $productid =  $request->id;
        $datas =   Selectproduct::where(['userid' => auth()->user()->id, 'purchaseId' => $productid])->get();

        return view('purchasesdetails',compact('datas'));
    }
}
