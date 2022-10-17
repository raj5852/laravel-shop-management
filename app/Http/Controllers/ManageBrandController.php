<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class ManageBrandController extends Controller
{
    //
    function index()
    {
        $brands = Brand::where('userid', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('managebrand', compact('brands'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    function update(Request $request)
    {
        $brand = Brand::find($request->hiddenId);
        if ($request->file) {

            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/brand');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);


            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->img = 'brand/' . $input['file'];
            $brand->save();
            return redirect()->back()->withSuccess('Data Updated Successfully');
        } else {
            $brand->name = $request->name;
            $brand->description = $request->description;

            $brand->save();
            return redirect()->back()->withSuccess('Data Updated Successfully');

        }
        return $request->all();
    }
    function delete(Request $request){
        $id =  $request->id;
        $brand =  Brand::where(['userid'=>auth()->user()->id,'id'=>$id])->first();
        if($brand){
            $brand->delete();

            return redirect()->back()->withSuccess("Data Deleted Successfully!");
        }else{
            return "You have No access";
        }
    }

}
