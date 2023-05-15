<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'team_id'=>$this->id,
            'team_name'=>$this->team_name,
            'sport'=>new SportResource($this->sport), 
        ];

    }
}
