<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ticket_id'=>$this->id,
            'ticket_number'=>$this->ticket_number,
            'price'=>$this->ticket_price,
            'booking'=>new BookingResource($this->booking),
        ];
    }
}
