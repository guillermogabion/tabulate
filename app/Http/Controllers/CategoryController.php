<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function store(Request $request)
    {

        // return $request;
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->event_id = $request->event_id;
        if (!str_contains($request->avatar, '/images')) {
            $image = $request->avatar;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $data = base64_decode($image);
            $imageName = date("YmdHis") . '.' . 'jpeg';
            file_put_contents(public_path() . '/' . 'images/category/' . $imageName, $data);
            $category->avatar = $imageName;
        }
        $category->save();
        return response()->json([
            'message' => "Category Added"
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $requestData = $request->all();
        $data->update($requestData);
        return response()->json([
            'message' => 'Successfully Updated'
        ], 200);
    }

    public function index()
    {
        return Category::get();
    }

    public function fetchCategory($id)
    {
        $data = Category::where('event_id', $id)->get();
        return $data;
    }
}
