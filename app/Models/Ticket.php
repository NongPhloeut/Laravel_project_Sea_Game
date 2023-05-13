<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
