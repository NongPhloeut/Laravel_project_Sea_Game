<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventSportResource;
use App\Http\Resources\ShowEventsResource;
use App\Models\EventSport;
use Illuminate\Http\Request;

class EventSportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventSport = EventSport::all();

        $eventSport = EventSportResource::collection($eventSport);

        return response()->json(['Get cuccessfully'=>true,'teamsInEvent'=>$eventSport],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventSport = EventSport::store($request);

        return response()->json(['Create cuccessfully'=>true,"event_sports"=>$eventSport],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventSport = EventSport::find($id);

        $eventSport = new ShowEventsResource($eventSport);

        return response()->json(['Get cuccessfully'=>true,'teamsInEvent'=>$eventSport],202); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eventSport = EventSport::store($request,$id);

        return response()->json(['Update cuccessfully'=>true,"event_sports"=>$eventSport],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventSport = EventSport::find($id);

        $eventSport->delete();
        
        return response()->json(['Delete cuccessfully'=>true,"events"=>$eventSport],202); 
    }
}
