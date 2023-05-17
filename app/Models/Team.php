<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'description',
        'sport_id'
    ];

    public static function store($request,$id=null){
        
        $teams = $request->only([
            'team_name',
            'description',
            'sport_id'
        ]);
        
        if ($id) {
            $teams = self::updateOrCreate(['id'=>$id],$teams); 
        } else {
            $teams = self::create($teams);
            $id = $teams->id;
        }
        
        return $teams;
    }

    /// belong to one event
    public function sport():BelongsTo{
        return $this->belongsTo(Sport::class);
    }
}
