<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowVenueResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'venue_id' => $this->id,
            'venue_name' => $this->venue_name,
            'events' => VenueResources::collection($this->events),
        ];
    }
}
