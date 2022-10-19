<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $supplier = new Supplier();
        $supplier->userid = auth()->user()->id;
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
        return response()->json('success');
    }

    function getSupplier(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $data = Supplier::select("id", "name")->where('userid', auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        if (!$request->has('q')) {
            $search = $request->q;
            $data = Supplier::select("id", "name")->where('userid', auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        return response()->json($data);
    }
    function getproduct(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $data = Product::select("id", "name")->where('userid', auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        if (!$request->has('q')) {
            $search = $request->q;
            $data = Product::select("id", "name")->where('userid', auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        return response()->json($data);
    }
}
