<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Image;

class ManageCategoryController extends Controller
{
    //
    function index()
    {
        return view('managecategory');
    }

    function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where(['userid' => auth()->user()->id])->orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" data-id=' . $row . '  class="edit btn btn-success btn-sm myEdit">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    if ($row->img) {
                        $actionBtn = '<img style="width:50px" src="' . $row->img . '">';
                    } else {
                        $actionBtn = '<img style="width:50px" src="/projectimg/noimage.png">';
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }
    function getId(Request $request)
    {
        $find = Category::where(['userid' => auth()->user()->id, 'id' => $request->id])->first();
        return response()->json($find);
    }

    function update(Request $request)
    {
        $category = Category::where('userid', auth()->user()->id)->find($request->hiddenId);
        if ($request->file('file')) {
            $image = $request->file('file');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/category');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);


            $category->name = $request->name;
            $category->img = 'category/' . $input['file'];
            $category->save();
            return response()->json('success');
        } else {
            $category->name = $request->name;
            $category->save();
            return response()->json('success');
        }
    }
    function ajax(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Category::select("id", "name")->where('userid',auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        if (!$request->has('q')) {
            $search = $request->q;
            $data = Category::select("id", "name")->where('userid',auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        return response()->json($data);
    }
    function ajaxBrand(Request $request){
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Brand::select("id", "name")->where('userid',auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        if (!$request->has('q')) {
            $search = $request->q;
            $data = Brand::select("id", "name")->where('userid',auth()->user()->id)
                ->where('name', 'LIKE', "%$search%")
                ->take(10)
                ->get();
        }
        return response()->json($data);
    }
}
