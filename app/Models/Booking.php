<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
        'status',
        'user_id',
        'event_id'
    ];

    public static function store($request,$id=null){
        $bookings = $request->only([
            'booking_date',
            'status',
            'user_id',
            'event_id'
        ]);

        $bookings = self::updateOrCreate(['id'=>$id],$bookings);
        return $bookings;
    }
/// booking belong to a uesr 
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
