<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'create_by'=>$this->user->id,
            'event_id' => $this->id,
            'event_name' => $this->event_name,
            'description' => $this->description,
            'match_date' => $this->match_date,
            'match_time' => $this->match_time,
            'sports_in_event' => SportResource::collection($this->sports),
            'event_bookings' => BookingResource::collection($this->bookings),
            'venue_of_event' => new VenueResources($this->venue),
        ];
    }
}
