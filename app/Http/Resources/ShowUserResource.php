<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number ?? null, // if user don't have phone number display now
            'bookings'=> BookingResource::collection($this->bookings ?? null),
            'events'=> EventsResource::collection($this->events ?? null),
        ];
    }
}
