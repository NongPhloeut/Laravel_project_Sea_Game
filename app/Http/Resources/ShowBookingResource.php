<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'booking_id'=>$this->id,
            'booking_date'=>$this->booking_date,
            'ticket_booking'=>new TicketResources($this->ticketBooking),
            'event_booking'=>new EventsResource($this->event),
            'booking_by_users'=>new UserResource($this->user),
        ];
    }
}
