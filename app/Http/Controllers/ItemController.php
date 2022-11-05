<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = new Item();
        $requestData = $request->all();
        $data->create($requestData);
        return response()->json([
            'message' => 'Item Added'
        ], 201);
    }
    public function edit(Request $request, $id)
    {
        $data = Item::find($id);
        $requestData = $request->all();
        $data->create($requestData);
        return response()->json([
            'message' => 'Item Updated'
        ]);
    }
    public function destroy($id)
    {
        $data = Item::find($id);
        $data->destroy();
        return response()->json([
            'message' => 'Item Removed'
        ], 200);
    }
    public function pagination(Request $request)
    {
        $data = Item::query();
        if ($request->input('keyword') != "") {
            $keyword = $request->input('keyword');
            // $category = $request->input('category');
            $data->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
                // ->where('category_id', 'LIKE', $category);
            });
        }
        return $data->orderBy('name', 'asc')->paginate(10);
    }
    public function search(Request $request)
    {
        $data = Item::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $data->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
                // ->orWhere('last_name', 'LIKE', "%$keyword%");
            });
        }
        return $data->orderBy('name', 'desc')->get();
    }
}
