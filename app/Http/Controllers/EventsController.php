<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventsResource;
use App\Http\Resources\ShowEventsResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $eventsName = request('event_name');
        $events = Event::where('event_name','like','%'.$eventsName.'%')->get();

        $events = EventsResource::collection($events);

        return response()->json(['Get cuccessfully'=>true,"events"=>$events],202);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $events = Event::store($request);

        return response()->json(['Create cuccessfully'=>true,"events"=>$events],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);

        $events = new ShowEventsResource($events);

        return response()->json(['Get cuccessfully'=>true,"events"=>$events],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $events = Event::store($request,$id);

        return response()->json(['Create cuccessfully'=>true,"event_sports"=>$events],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $events = Event::find($id);

        $events->delete();
        
        return response()->json(['Delete cuccessfully'=>true,"events"=>$events],202); 
    }

}
