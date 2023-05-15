<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_name',
        'description',
    ];

    
    /// belong to many event sport
    public function events(){
        return $this->belongsToMany(Event::class,'event_sports')->withTimestamps();
    }
    /// one spot have many team 
    public function teams():HasMany{
        return $this->hasMany(Team::class);
    }

    // create sport using synce
    public static function store($request,$id=null){
        $sports = $request->only([
            'sport_name',
            'description',
        ]);

        $sports = self::updateOrCreate(['id'=>$id],$sports);
        return $sports;
    }
} 
