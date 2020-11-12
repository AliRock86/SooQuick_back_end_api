<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const VALIDATION_RULE_STORE = [
        'merchant_id' => ['required','numeric'],
        'customer_id' => ['required','numeric'],
        'delivery_price_id' => ['required','numeric'],
        'product_price' => ['required','numeric'],
        'serial_number' => ['required'],
        'status_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'merchant_id' => ['required','numeric'],
        'customer_id' => ['required','numeric'],
        'delivery_price_id' => ['required','numeric'],
        'product_price' => ['required','numeric'],
        'serial_number' => ['required'],
        'status_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }

    public function deliveryComp()
    {
        return $this->belongsTo('App\Models\deliveryComp');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function deliveryPrice()
    {
        return $this->belongsTo('App\Models\DeliveryPrice');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function orderAcation()
    {
        return $this->hasMany('App\Models\OrderAcation');
    }

    public function orderInstruction()
    {
        return $this->hasMany('App\Models\OrderInstruction');
    }

    public function transferOrderByDrivers()
    {
        return $this->hasMany('App\Models\TransferOrderByDrivers');
    }

    public function transferredOrders()
    {
        return $this->hasMany('App\Models\TransferredOrders');
    }

}
