<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use DataTables;

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
            $data =Customer::select("id","name")->where('userid',auth()->user()->id)
            		->where('name','LIKE',"%$search%")
                    ->take(10)
            		->get();
        }
        if(!$request->has('q')){
            $search = $request->q;
            $data =Customer::select("id","name")->where('userid',auth()->user()->id)
            		->where('name','LIKE',"%$search%")
                    ->take(10)
            		->get();
        }
        return response()->json($data);
    }
    function addCustomerPost(Request $request){
        // return $request->all();
        $customer = new Customer();
        $customer->userid = auth()->user()->id;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->back()->withSuccess("Customer created Successfully!");
    }

    function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where(['userid' => auth()->user()->id])->orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" data-id=' . $row->id . '  class=" btn btn-success btn-sm myAdd">Add</a> ';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        $actionBtn = '<img style="width:50px" src="' . $row->image . '">';
                    } else {
                        $actionBtn = '<img style="width:50px" src="/projectimg/noimage.png">';
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }
    
}
