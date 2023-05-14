<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowVenueResources;
use App\Http\Resources\VenueResources;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venue = Venue::all();
        $venue = VenueResources::collection($venue);
        return response()->json(['Create cuccessfully'=>true,'venue'=>$venue],202);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venue = Venue::store($request);
        return response()->json(['Create cuccessfully'=>true,'venue'=>$venue],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::find($id);
        $venue = new ShowVenueResources($venue);
        return response()->json(['Create cuccessfully'=>true,'venue'=>$venue],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venue = Venue::store($request,$id);
        return response()->json(['Create cuccessfully'=>true,'venue'=>$venue],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue = Venue::find($id);
        $venue->delete();

        return response()->json(['Create cuccessfully'=>true,'venue'=>$venue],202);
    }
}
