<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Image;

class ManageProduct extends Controller
{
    //
    function index()
    {
        return view('manageproduct');
    }


    function getProductDetails(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where(['userid' => auth()->user()->id])->orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <a href="javascript:void(0)" data-id=' . $row->id . '  class="edit btn btn-primary btn-sm ViewBtn">View</a>
                    <a href="javascript:void(0)" data-id=' . $row->id . '  class="edit btn btn-success btn-sm myEdit">Edit</a>
                     <a href="javascript:void(0)" data-id=' . $row->id . ' class="Mydelete btn btn-danger btn-sm">Delete</a>';
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

    function getProductIdData(Request $request)
    {
        $product = Product::where(['userid' => auth()->user()->id, 'id' => $request->id])->first();
        return response()->json($product);
    }
    function productUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mainunit' => 'required',
            'saleprice' => 'required',
            'buycost' => 'required',
        ]);
        if (!$request->code) {
            $request->code = time();
        }

        if ($request->file('file')) {
            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/product');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);




            $product = Product::find($request->hiddenId);
            
            $product->name = $request->name;
            $product->code = $request->code;
            $product->unit = $request->mainunit;
            $product->price = $request->saleprice;
            $product->cost = $request->buycost;
            $product->details = $request->details;
            $product->image = 'product/' . $input['file'];
            $product->save();

            return response()->json('success');
        } else {

            $product = Product::find($request->hiddenId);

            $product->userid = auth()->user()->id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->unit = $request->mainunit;
            $product->price = $request->saleprice;
            $product->cost = $request->buycost;
            $product->details = $request->details;
            $product->save();

            return response()->json('success');

        }
    }
    function productdelete(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();

        return response()->json('success');
    }
}
