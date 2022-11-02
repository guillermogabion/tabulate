<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //

    public function store(Request $request)
    {
        $event = new Event();
        $requestData = $request->all();
        $data = $event->create($requestData);

        return response()->json([
            'message' => 'New Event Added',
            'event-info' => $data,
            'admin' => Auth::user()->name
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $requestData = $request->all();
        $event->update($requestData);

        return response()->json([
            'message' => 'Event Updated',
            'event-info' => $event
        ]);
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
}
