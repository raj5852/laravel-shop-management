<?php

namespace App\Http\Controllers;

use App\Models\Posselect;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class PosSelectController extends Controller
{
    
    function index(Request $request)
    {
        $select = Posselect::where(['productid' => $request->id, 'issell' => 0])->first();
        if ($select) {
            return response()->json(['selected' => 'You have already selected this product']);
        } else {
            $product = Product::find($request->id);

            if ($product->stock == 0) {
                return response()->json(['stock' => 'You have no stock']);
            } else {

                $posselect = new Posselect();
                $posselect->userid = auth()->user()->id;
                $posselect->productid = $request->id;
                $posselect->name = $product->name;
                $posselect->qnt     = 1;
                $posselect->price = $product->price;
                $posselect->subt = $product->price;

                $posselect->save();

                return response()->json(['success' => 'success']);
            }
        }
    }
    function getData()
    {
        $data = Posselect::where(['userid' => auth()->user()->id, 'issell' => 0])->get();
        return response()->json($data);
    }
    function update(Request $request)
    {
        // return response()->json($request->all());
        $data =  Posselect::find($request->id);

        $data->qnt = $request->val;
        $data->subt = $request->val * $data->price;
        $data->save();

        return response()->json('success');
    }
    function inputDataDelete(Request $request)
    {
        $id = $request->id;
        $data =  Posselect::find($id);
        $data->delete();

        return response()->json(['success' => 'deleted']);
    }
    function payment(Request $request)
    {
        $data = Posselect::where(['userid' => auth()->user()->id, 'issell' => 0])->get();

        if (count($data) > 0) {
            $sales = new Sale();
            $sales->userid = auth()->user()->id;
            $sales->name = $request->name;
            $sales->invoice = time();
            $sales->amount = $request->total;
            $sales->save();
            $saleId = $sales->id;

            foreach ($data as $row) {
                Product::where(['id' => $row->productid,'userid'=>auth()->user()->id])->decrement('stock',$row->qnt);
            }

            $final =   Posselect::where(['userid' => auth()->user()->id, 'issell' => 0])->update(['issell' => 1, 'saleid' => $saleId]);

            



            return response()->json('ss');
        } else {
            return "Before select Prodcut";
        }
    }
}
