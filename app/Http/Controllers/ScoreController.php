<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //

    public function store(Request $request)
    {
        $data = new Score();
        $requestData = $request->all();
        $data->create($requestData);
        return response()->json([
            'message' => 'Participant Successfully Rated'
        ]);
    }
}
