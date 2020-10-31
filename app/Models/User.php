<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    public const VALIDATION_RULE_STORE = [
        'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
        'password' => ['required','min:8','confirmed'],
        'long' => ['required'],
        'lat' => ['required'],
        'images' => ['array'],
    ];
    public const VALIDATION_RULE_LOGIN =[
        'user_phone' => ['required'],
        'password' => ['required','min:8','confirmed'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'user_phone' => ['required','unique:users'],
        'password' => ['required','min:8','confirmed'],
        'region_id' => ['required'],
        'long' => ['required'],
        'lat' => ['required'],
        'images' => ['array'],
    ];

    public const VALIDATION_RULE_CHANGE_PASSWORD = [
        'password' => ['required','min:8','confirmed'],
        'otpNumber' =>['required|min:6|numeric']
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'user_email', 'user_phone',
    ];

    public function getJWTIdentifier()
    {
       return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [];
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function permision()
    {
        return $this->belongsTo('App\Models\Permision');
    }
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    public function otp()
    {
        return $this->hasMany('App\Models\Otp');
    }
    public function customer()
    {
        return $this->hasMany('App\Models\Customer');
    }
    public function merchant()
    {
        return $this->hasMany('App\Models\Merchant');
    }
    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function driver()
    {
        return $this->hasMany('App\Models\Driver');
    }
}
