<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'match_date',
        'match_time',
        'user_id',
        'venue_id'
    ];

    public static function store($request,$id=null){
        $events = $request->only([
            'event_name',
            'match_date',
            'match_time',
            'user_id',
            'venue_id'
        ]);

        $events = self::updateOrCreate(['id'=>$id],$events);
        return $events;
    }
}
