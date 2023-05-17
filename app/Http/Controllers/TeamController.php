<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\ShowTeamResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();

        $teams = TeamResource::collection($teams);

        return response()->json(['Create successfully'=>true,"teams"=>$teams],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $teams = Team::store($request);

        return response()->json(['Create successfully'=>true,"teams"=>$teams],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teams = Team::find($id);
        $teams = new ShowTeamResource($teams);

        return response()->json(['Show successfully'=>true,"teams"=>$teams],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teams = Team::store($request,$id);

        return response()->json(['Update successfully'=>true,"teams"=>$teams],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams = Team::find($id);
        $teams->delete();

        return response()->json(['Delete successfully'=>true,"teams"=>$teams],202);
    }
}
