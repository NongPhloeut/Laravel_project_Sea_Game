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

        // $sportName = request('sport_name');
        // dd($sportName);
        // $eventSport = Sport::where('sport_name','like','%'.$sportName.'%')->get();
        
        $eventSport = SportResource::collection($eventSport);
        // dd($eventSport);

        return response()->json(['Get cuccessfully'=>true,'sport in event'=>$eventSport],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRquest $request)
    {
        $sports = Sport::store($request);
        return response()->json(['Create successfully'=>true,"sport"=>$sports],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventSport = Sport::find($id);

        $eventSport = new ShowSportResource($eventSport);

        return response()->json(['Get sports successfully'=>true,'sport in event'=>$eventSport],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sports = Sport::find($request,$id);

        return response()->json(['Update successfully'=>true,'sport'=>$sports],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sports = Sport::find($id);
        $sports->delete();

        return response()->json(['Delete successfully'=>true,'sport'=>$sports],202);
    }
}
