<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class AddCategoryController extends Controller
{
    //
    function  index()
    {
        return view('addcategory');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);


        if($request->file('file')){
            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = public_path('/category');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);

            $category = new Category();
            $category->userid = auth()->user()->id;
            $category->name = $request->name;
            $category->img = 'category/'. $input['file'];
            $category->save();
            return redirect()->back()->withSuccess('Category Created Successfully!');
        }else{
            
            $category = new Category();
            $category->userid = auth()->user()->id;
            $category->name = $request->name;
            $category->save();
            return redirect()->back()->withSuccess('Category Created Successfully!');

        }
        


     
    }
}
