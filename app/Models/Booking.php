<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
        'status',
        'user_id',
        'event_id',
        'ticket_number',
        'ticket_price',
    ];

    public static function store($request,$id=null){

        $bookings = $request->only([
            'booking_date',
            'status',
            'user_id',
            'event_id',
        ]);

        $bookings = self::updateOrCreate(['id'=>$id],$bookings);
        return $bookings;
    }
    /// booking belong to a uesr 
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    /// a event can have multiple booking
    public function event():BelongsTo{
        return $this->belongsTo(Event::class);
    }
    
    // one booking one ticket 
    public function ticketBooking():HasOne{
        return $this->hasOne(Ticket::class);
    }
}
