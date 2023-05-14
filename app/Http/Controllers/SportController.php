<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventSport = Sport::all();

        // $eventSport = ::collection($eventSport);

        return response()->json(['Get cuccessfully'=>true,'teamsInEvent'=>$eventSport],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sports = Sport::store($request);

        $sports->events()->create([
            'event_id'=>request('event_id'),
        ]);
        return response()->json(['Create cuccessfully'=>true,"sport"=>$sports],202);
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
