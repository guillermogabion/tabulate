<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //

    public function store(Request $request)
    {
        $event = new Event();
        if (Event::where('title', $request->title)->exists()) {
            return response()->json([
                'message' => "Event Already Exist"
            ], 200);
        } else {
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start = $request->start;
            $event->end = $request->end;
            if (!str_contains($request->photo, '/images')) {
                $image = $request->photo;  // your base64 encoded
                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);
                $data = base64_decode($image);
                $imageName = date("YmdHis") . '.' . 'jpeg';
                file_put_contents(public_path() . '/' . 'images/event/' . $imageName, $data);
                $event->photo = $imageName;
            }
            $event->save();
            return response()->json([
                'message' => "Event Added"
            ], 201);
        }
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start = $request->start;
        $event->end = $request->end;
        if (!str_contains($request->photo, '/images')) {
            $image = $request->photo;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $data = base64_decode($image);
            $imageName = date("YmdHis") . '.' . 'jpeg';
            file_put_contents(public_path() . '/' . 'images/event/' . $imageName, $data);
            $event->photo = $imageName;
        }
    }

    public function destroy($id)
    {
        $event = Event::where('id', $id)->delete();
        return response()->json([
            'message' => 'Event Removed'
        ]);
    }

    public function index()
    {
        return Event::get();
    }
    public function pagination(Request $request)
    {
        $data = Event::query();
        if ($request->input('keyword') != "") {
            $keyword = $request->input('keyword');
            $data->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%$keyword%");
            });
        }
        $event = $data->paginate(10);
        return EventResource::collection($event);
    }
    public function search(Request $request)
    {
        $data = Event::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $data->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%$keyword%");
            });
        }
        $event = $data->get();
        return EventResource::collection($event);
    }

    public function fetchEvent($id)
    {
        $data = Event::where('id', $id)->first();
        // return response()->json([
        //     'message' => 'Event Active',
        //     'data' => $data
        // ])
        return $data;
    }
}
