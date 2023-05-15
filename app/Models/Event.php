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
        'description',
        'match_date',
        'match_time',
        'user_id',
        'venue_id',
    ];

    
// belongs to user (on user have many events)
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }


    /////////// events belong to many booking********************************
    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }

    ///////////events belong to many venue**********************************
    public function venue():BelongsTo{
        return $this->belongsTo(Venue::class);
    }
    
    /// belong to many for event_sport**************************************
    public function sports(){
        return $this->belongsToMany(Sport::class,'event_sports')->withTimestamps();
    }

    public static function store($request,$id=null){
        $sport = $request->only([
            'event_name',
            'description',
            'match_date',
            'match_time',
            'user_id',
            'venue_id',
        ]);

        $sport = self::updateOrCreate(['id'=>$id],$sport);
        // create sport using sync
        $sports = request('sports');
        $sport->sports()->sync($sports);

        return $sport;
    }

}
