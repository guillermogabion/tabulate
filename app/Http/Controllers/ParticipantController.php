<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //


    public function index()
    {
        return Participant::all();
        // return 'Hi';
    }

    public function store(Request $request)
    {
        $data = new Participant();
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->gender = $request->gender;
        $data->birthdate = $request->birthdate;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->address = $request->address;
        $data->home = $request->home;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zipcode = $request->zipcode;
        $data->country = $request->country;
        $data->contest_number = $request->contest_number;
        if (!str_contains($request->avatar, '/images')) {
            $image = $request->avatar;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $datacode = base64_decode($image);
            $imageName = date("YmdHis") . '.' . 'jpeg';
            file_put_contents(public_path() . '/' . 'images/participant/' . $imageName, $datacode);
            $data->avatar = $imageName;
        }
        $data->save();
        return response()->json([
            'message' => "New Participant Added",
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Participant::find($id);
        $requestData = $request->all();
        $data->update($requestData);

        return response()->json([
            'message' => 'Participant Updated',
            'info' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $data = Participant::where('id', $id)->delete();

        return response()->json([
            'message' => 'Participant Removed'
        ], 200);
    }
    public function search(Request $request)
    {
        $data = Participant::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $data->where(function ($query) use ($keyword) {
                $query->where('firstname', 'LIKE', "%$keyword%")
                    ->orWhere('lastname', 'LIKE', "%$keyword%");
            });
        }
        return $data->orderBy('lastname', 'desc')->get();
    }

    public function pagination(Request $request)
    {
        $data = Participant::query();
        if ($request->input('keyword') != "") {
            $keyword = $request->input('keyword');
            $data->where(function ($query) use ($keyword) {
                $query->where('lastname', 'LIKE', "%$keyword%");
            });
        }
        return $data->orderBy('lastname', 'asc')->paginate(10);
    }
}
