<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'description',
        'event_sport_id'
    ];

    public static function store($request,$id=null){
        $teams = $request->only([
            'team_name',
            'description',
            'event_sport_id'
        ]);

        $teams = self::updateOrCreate(['id'=>$id],$teams);
        return $teams;
    }

    /// belong to one event
     

    public function eventSport():BelongsToMany{
        return $this->belongsToMany(EventSport::class);
    }
}
