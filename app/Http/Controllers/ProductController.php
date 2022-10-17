<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    
    function index(){
        return view('products');
    }
    function productCreate(Request $request){
      
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'brand'=>'required',
            'mainunit'=>'required',
            'saleprice'=>'required',
            'buycost'=>'required',
            'buycost'=>'required',
        ]);
        if(!$request->code){
            $request->code = time();
        }

        if($request->file('file')){
            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/product');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);


           

            $product = new Product();
            $product->userid = auth()->user()->id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->unit = $request->mainunit;
            $product->price = $request->saleprice;
            $product->cost = $request->buycost;
            $product->details = $request->details;
            $product->image = 'product/'.$input['file'];
            $product->save();

            return redirect()->back()->withSuccess("success");
        }else{
            
            $product = new Product();
            $product->userid = auth()->user()->id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->unit = $request->mainunit;
            $product->price = $request->saleprice;
            $product->cost = $request->buycost;
            $product->details = $request->details;
            $product->save();

            return redirect()->back()->withSuccess("success");

        }
    }
}
