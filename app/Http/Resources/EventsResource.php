<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'create_by'=>$this->user->name,
            'event_id' => $this->id,
            'event_name' => $this->event_name,
            'description' => $this->description,
            'match_date' => $this->match_date,
            'match_time' => $this->match_time,
            'event_sports' => $this->sports,
            'event_bookings' =>$this->bookings,
            'venue_of_event' => $this->venue,
        ];
    }
}
