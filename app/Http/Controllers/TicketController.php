<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowTicketResources;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tickets = Ticket::store($request);

        return response()->json(['Create cuccessfully'=>true,"tickets"=>$tickets],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket = new ShowTicketResources($ticket);
        return response()->json(['Show cuccessfully'=>true,"tickets"=>$ticket],202);
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