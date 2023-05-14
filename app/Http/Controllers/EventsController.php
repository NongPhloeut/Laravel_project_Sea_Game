<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventsResource;
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
        // $events = Event::store($request);

        // $events->sports()->create([
        //     'sport_name'=>request('sport_name'),
        //     'description'=>request('description'),
        // ]);

        $events = Event::find(1);
        $sportIds = [1, 2, 3];
        
        $events->addSport($sportIds);

        return response()->json(['Create cuccessfully'=>true,"events"=>$events],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
