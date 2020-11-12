<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function deliveryPrice()
    {
        return $this->hasMany('App\Models\DeliveryPrice');
    }

    public function driver()
    {
        return $this->hasMany('App\Models\Driver');
    }

    public function offer()
    {
        return $this->hasMany('App\Models\Offer');
    }
}
