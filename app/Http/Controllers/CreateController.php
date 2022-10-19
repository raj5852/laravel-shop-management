<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Selectproduct;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    //
    function index(Request $request){
        $supplier = $request->supplier;
        $total =  $request->total;

        $purchases = new Purchase();
        $purchases->userid = auth()->user()->id;
        $purchases->date = date("Y-m-d");
        $purchases->payable = $total;
        $purchases->billno = time();
        $purchases->name = $supplier;

        $purchases->paid = '0';
        $purchases->due = '0';
        $purchases->save();
        $purchasesId = $purchases->id;


        $xx =  Selectproduct::select(['qty','productid'])->where(['userid'=>auth()->user()->id,'purchaseId'=>0])->get();
        foreach($xx as $x){

            Product::where('id',$x->productid)->increment('stock',$x->qty);
        }


       Selectproduct::where(['userid'=>auth()->user()->id,'purchaseId'=>0])->update(['purchaseId'=>$purchasesId]);

       return redirect()->back()->withSuccess("Success!");

    }
}
