<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function store(Request $request)
    {
        $data = new Category();
        $requestData = $request->all();
        $data->create($requestData);
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
}
