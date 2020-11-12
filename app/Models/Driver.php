<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public const VALIDATION_RULE_STORE = [
        'user_id' => ['required','numeric'],
        'driver_phone' => ['required','numeric'],
        'car_number' => ['required'],
        'car_owner_type' => ['required'],
        'car_owner_name' => ['required','numeric'],
        'region_id' => ['required','numeric'],
        'status_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'user_id' => ['required','numeric'],
        'driver_phone' => ['required','numeric'],
        'car_number' => ['required'],
        'car_owner_type' => ['required'],
        'car_owner_name' => ['required','numeric'],
        'region_id' => ['required','numeric'],
        'status_id' => ['required','numeric'],
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
