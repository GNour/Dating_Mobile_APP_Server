<?php

namespace App\Models;

use App\Models\UserHobby;
use App\Models\UserInterest;
use App\Models\UserNotification;
use App\Models\UserPicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'interested_in',
        'dob',
        'height',
        'weight',
        'nationality',
        'city',
        'country',
        'bio',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function images()
    {
        return $this->hasMany(UserPicture::class);
    }

    public function notifications()
    {
        return $this->hasMany(UserNotification::class);
    }

    public function hobbies()
    {
        return $this->hasMany(UserHobby::class);
    }

    public function interests()
    {
        return $this->hasMany(UserInterest::class);
    }

    // Both for getting user connections, Checks user1_id & user2_id :: use with(["connectionsOne","connectionsTwo"]);
    public function connections()
    {
        return $this->load(["connectionsOne", "connectionsTwo"]);
    }

    public function connectionsOne()
    {
        return $this->hasMany(UserConnection::class, "user1_id", "id");
    }
    public function connectionsTwo()
    {
        return $this->hasMany(UserConnection::class, "user2_id", "id");
    }

    public function blocked()
    {
        return $this->hasMany(UserBlock::class, "from_user_id", "id");
    }
}
