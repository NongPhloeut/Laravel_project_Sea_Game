<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSport extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'sport_id',
    ];

    public static function store($request,$id=null){
        $eventSport = $request->only([
            'event_id',
            'sport_id',
        ]);

        $eventSport = self::updateOrCreate(['id'=>$id],$eventSport);
        return $eventSport;
    }
}
