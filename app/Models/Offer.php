<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public const VALIDATION_RULE_STORE = [
        'merchant_id' => ['required','numeric'],
        'offer_delivery_price_value' => ['required'],
        'region_id' => ['required','numeric'],
        'status_id' => ['required'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'merchant_id' => ['required','numeric'],
        'offer_delivery_price_value' => ['required'],
        'region_id' => ['required','numeric'],
        'status_id' => ['required'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

}
