<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = new Customer();
        $requestData = $request->all();
        $register = $data->create($requestData);

        return response()->json([
            'message' => 'New Participant Added',
            'info' => $register
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        $requestData = $request->all();
        $data->update($requestData);

        return response()->json([
            'message' => 'Participant Updated',
            'info' => $data
        ], 200);
    }
    public function destroy($id)
    {
        $data = Customer::where('id', $id)->delete();

        return response()->json([
            'message' => 'Participant Removed'
        ], 200);
    }

    public function search(Request $request)
    {
        $data = Customer::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $data->where(function ($query) use ($keyword) {
                $query->where('first_name', 'LIKE', "%$keyword%")
                    ->orWhere('last_name', 'LIKE', "%$keyword%");
            });
        }
        return $data->orderBy('last_name', 'desc')->get();
    }

    public function pagination(Request $request)
    {
        $data = Customer::query();
        if ($request->input('keyword') != "") {
            $keyword = $request->input('keyword');
            $data->where(function ($query) use ($keyword) {
                $query->where('last_name', 'LIKE', "%$keyword%");
            });
        }
        return $data->orderBy('last_name', 'asc')->paginate(10);
    }
}
