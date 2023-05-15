<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sport_id'=>$this->id,
            'sport_name'=>$this->sport_name,
            'description'=>$this->description,
            'events'=>$this->events,
            'teams'=>$this->teams,
        ];
    }
}
