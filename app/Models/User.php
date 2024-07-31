<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'email_verified_at',
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
        'password' => 'hashed',
    ];
    /**
    * Get the identifier that will be stored in the subject claim of the JWT.
    *
    * @return mixed
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    /**
    * Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
    */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function getLokasiAttribute()
    {
        $level = $this->profile->level;
        switch ($level) {
            case 1:
                return 'Desa/Kelurahan';
                break;
            case 2:
                return 'Kecamatan';
                break;
            case 3:
                return 'Kabupaten';
                break;
            default:
                return 'Admin';
                break;
        }
    }

    public function getLeveltypeAttribute()
    {
        $level = $this->profile->level;
        switch ($level) {
            case 1:
                return 'Desa/Kelurahan';
                break;
            case 2:
                return 'Kecamatan';
                break;
            case 3:
                return 'Kabupaten';
                break;
            case 6:
                    return 'Admin';
                    break;
            case 9:
                return 'superadmin';
                break;
        }
    }
}

