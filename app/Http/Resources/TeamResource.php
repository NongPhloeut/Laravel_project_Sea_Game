<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            // 'match 1'=>$this->eventSport->team,
            // 'match 2'=>$this->eventSport->team, 
        ];
    }
}
