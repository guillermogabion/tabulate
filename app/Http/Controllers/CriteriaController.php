<?php

namespace App\Http\Controllers;

use App\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = new Criteria();
        $requestData = $request->all();
        $data->create($requestData);
        return response()->json([
            'message' => 'New Criteria Added',
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Criteria::find($id);
        $requestData = $request->all();
        $data->update($requestData);
        return response()->json([
            'message' => 'Criteria Updated',
            'criteria' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = Criteria::where('id', $id)->delete();
        return response()->json([
            'message' => 'Criteria Successfully removed'
        ]);
    }

    public function fetchCriteria($id)
    {
        $data = Criteria::find($id);
        return $data->where('category_id', $id)->get();
    }
}
