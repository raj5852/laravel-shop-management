<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class POSController extends Controller
{
    //
    function index()
    {
        return view('pos');
    }
    public function getCustomer(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Customer::select("id","name")
            		->where('name','LIKE',"%$search%")
                    ->take(10)
            		->get();
        }
        if(!$request->has('q')){
            $search = $request->q;
            $data =Customer::select("id","name")
            		->where('name','LIKE',"%$search%")
                    ->take(10)
            		->get();
        }
        return response()->json($data);
    }

    
}
