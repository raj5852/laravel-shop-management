<?php

namespace App\Http\Controllers;

use App\Models\Posselect;
use App\Models\Sale;
use Illuminate\Http\Request;
use DataTables;

class SalesController extends Controller
{
  
    function index(){
        return view('sales');
    }

    function getData(Request $request){
        if ($request->ajax()) {
            $data = Sale::where(['userid' => auth()->user()->id])->orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/sales-details?id='.$row->id.'"  class="edit btn btn-success btn-sm myDetails">View Details</a> ';
                    return $actionBtn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    function selldetails(Request $request){
        $id =  $request->id;
        $sells =  Posselect::where(['userid'=>auth()->user()->id,'saleid'=>$id])->get();
        return view('sales-details',compact('sells'));

    }
}

