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
            'event_id' => $this->id,
            'event_name' => $this->event_name,
            'match_date' => $this->match_date,
            'match_time' => $this->match_time,
            'bookings' => $this->bookings,
            // 'venue' => $this->venue,
        ];
    }
}
