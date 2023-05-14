<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function store($request,$id = null)
    {
        $users = $request->only([
            'name',
            'email',
            'password',
            // 'phone_number',
        ]);

        $users['password'] = Hash::make($request->password);
       
        $users = self::updateOrcreate(['id'=>$id],$users);
        return $users;
    }
    // user has many booking
    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }
    // user has many events
    public function events():HasMany{
        return $this->hasMany(Event::class);
    }
}