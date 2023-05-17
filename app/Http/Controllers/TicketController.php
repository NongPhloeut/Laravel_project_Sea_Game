<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowTicketResources;
use App\Http\Resources\TicketResources;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();
        // dd($ticket);
        // $ticketNumber = request('ticket_number');
        // $ticket = Ticket::where('ticket_number','like','%'.$ticketNumber.'%')->get();
        

        $ticket = TicketResources::collection($ticket);


        return response()->json(['Show successfully'=>true,"tickets"=>$ticket],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);

        $ticket = new ShowTicketResources($ticket);
        return response()->json(['Show successfully'=>true,"tickets"=>$ticket],202);
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
