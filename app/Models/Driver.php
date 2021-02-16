<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public const VALIDATION_RULE_STORE = [
     
        'driver_phone' => ['required','numeric'],
        'car_number' => ['required','numeric'],
        'car_owner_type' => ['required'],
        'car_owner_name' => ['required'],
        'region_id' => ['required','numeric'],
       
        'full_name' => ['required'],
        'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
        'password' => ['required','min:8','confirmed'],
        'images' => ['array'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        // 'id' => ['required','numeric'],
        // 'user_id' => ['required','numeric'],
        'driver_phone' => ['required','numeric'],
        'car_number' => ['required','numeric'],
        'car_owner_type' => ['required'],
        'car_owner_name' => ['required'],
      
        'full_name' => ['required'],
        //'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
        'password' => ['required','min:8','confirmed'],
        'images' => ['array']
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function transferOrderByDrivers()
    {
        return $this->hasMany('App\Models\TransferOrderByDrivers');
    }

}
