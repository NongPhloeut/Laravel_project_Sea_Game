<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_name',
        'description',
    ];

    public static function store($request,$id=null){
        $sports = $request->only([
            'sport_name',
            'description',
        ]);

        $sports = self::updateOrCreate(['id'=>$id],$sports);
        return $sports;
    }

    /// belong to many event sport
    public function events(){
        return $this->belongsToMany(Event::class,'event_sports');
    }
} 
