<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\ShowBookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        $bookings = BookingResource::collection($bookings);

        return response()->json(['Get bookings cuccessfully'=>true,'Bookings'=>$bookings],202);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $bookings = Booking::store($request);

        // $bookings and create ticket
        $bookings->ticketBooking()->create([
            'ticket_number'=>request('ticket_number'),
            'ticket_price'=>request('ticket_price'),
            'event_id'=>request('event_id'),
        ]);

        return response()->json(['Create cuccessfully'=>true,"bookings"=>$bookings],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);

        $booking = new ShowBookingResource($booking);

        return response()->json(['Show cuccessfully'=>true,"bookings"=>$booking],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookings = Booking::store($request,$id);
        return response()->json(['Show cuccessfully'=>true,"bookings"=>$bookings],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return response()->json(['Delete cuccessfully'=>true,"bookings"=>$booking],202);
    }
}
