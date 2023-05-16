<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_name',
        'location',
    ];

    
    public static function store($request,$id=null){
       $venue = $request->only([
            'venue_name',
            'location',
       ]);

       $venue = self::updateOrCreate(['id'=>$id],$venue);
       return $venue;
    }
// one venue can have many events
    public function events():HasMany{
        return $this->hasMany(Event::class);
    }
}
