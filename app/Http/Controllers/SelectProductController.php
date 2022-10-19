<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Selectproduct;
use Illuminate\Http\Request;

class SelectProductController extends Controller
{
    //
    function index(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        
        $selectProduct = new Selectproduct();
        $selectProduct->userid = auth()->user()->id;
        $selectProduct->productid = $product->id;
        $selectProduct->name = $product->name;
        $selectProduct->rate = $product->price;
        $selectProduct->qty = $request->qunt;
        $selectProduct->total = $product->price*$request->qunt;
        $selectProduct->save();


        $selectproduct = Selectproduct::where('userid',auth()->user()->id)->get();
        return response()->json($selectproduct);


    }

    function getselectproduct(Request $request){
        $selectproduct = Selectproduct::where(['userid'=>auth()->user()->id,'purchaseId'=>0])->get();
        return response()->json($selectproduct);
    }

    function delteSelectval(Request $request){
        $id = $request->id;
        $selectval = Selectproduct::find($id);
        $selectval->delete();
        return response()->json('success');
    }
}
