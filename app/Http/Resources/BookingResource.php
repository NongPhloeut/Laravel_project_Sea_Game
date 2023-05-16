<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'booking_by_user'=>$this->user->name,
            'booking_id'=>$this->id,
            'booking_date'=>$this->booking_date,
            'ticket_created'=>$this->ticketBooking,
            'booking_event'=>$this->event,
        ];
    }
}
