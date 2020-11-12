<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    public const VALIDATION_RULE_STORE = [
        'delivery_comp_id' => ['required','numeric'],
        'from_region_id' => ['required','numeric'],
        'to_region_id' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'delivery_price_value' => ['required','numeric'],
        'status_id' => ['required','numeric'],
    ];

    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
        'from_region_id' => ['required','numeric'],
        'to_region_id' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'delivery_price_value' => ['required','numeric'],
        'status_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function deliveryComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany');
    }

    public function fromRegion()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function toRegion()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

}
