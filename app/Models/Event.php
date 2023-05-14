<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
// belongs to user (on user have many events)
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }


    /////////// events belong to many booking********************************
    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }
    ///////////events belong to many venue********************************
    public function venue():BelongsToMany{
        return $this->belongsToMany(Venue::class);
    }

}
