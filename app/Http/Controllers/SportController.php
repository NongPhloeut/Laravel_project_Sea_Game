<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRquest;
use App\Http\Resources\ShowSportResource;
use App\Http\Resources\SportResource;
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

        $eventSport = SportResource::collection($eventSport);

        return response()->json(['Get cuccessfully'=>true,'sport in event'=>$eventSport],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRquest $request)
    {
        $sports = Sport::store($request);
        return response()->json(['Create cuccessfully'=>true,"sport"=>$sports],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventSport = Sport::find($id);

        $eventSport = new ShowSportResource($eventSport);

        return response()->json(['Get sports cuccessfully'=>true,'sport in event'=>$eventSport],202);
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
