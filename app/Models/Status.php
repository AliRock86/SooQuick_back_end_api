<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{


    protected $guarded = [];
     
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function statusType()
    {
        return $this->belongsTo('App\Models\StatusType');
    }
    
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function deliveryCompany()
    {
        return $this->hasMany('App\Models\DeliveryCompany');
    }

    public function deliveryDriver()
    {
        return $this->hasMany('App\Models\DeliveryDrivers');
    }

    public function deliveryPrice()
    {
        return $this->hasMany('App\Models\DeliveryPrice');
    }

    public function offer()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function transferOrderByDrivers()
    {
        return $this->hasMany('App\Models\TransferOrderByDrivers');
    }

}
