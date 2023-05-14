<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'ticket_price',
        'event_id',
        'booking_id',
    ];

    
    public static function store($request,$id=null){
       $tickets = $request->only([
            'ticket_number',
            'ticket_price',
            'event_id',
            'booking_id',
       ]);

       $tickets = self::updateOrCreate(['id'=>$id],$tickets);
       return $tickets;
    }

    public function booking():BelongsTo{
        return $this->belongsTo(Booking::class);
    }

    ///
    public function ticketHasBooking():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}
