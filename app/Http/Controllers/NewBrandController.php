<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class NewBrandController extends Controller
{
    //
    function index()
    {
        return view('newbrand');
    }
    function addbrand(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);

        if ($request->file('file')) {

            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/brand');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);


            $brand = new Brand();
            $brand->userid = auth()->user()->id;
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->img = 'brand/' . $input['file'];
            $brand->save();

            return response()->json('success');
        } else {
            $brand = new Brand();
            $brand->userid = auth()->user()->id;
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->save();

            return response()->json('success');
        }
    }
    function createBrand(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);


        $category = new Brand();
        $category->userid = auth()->user()->id;
        $category->name = $request->name;
        $category->save();
        return response()->json('success');
    }
}
