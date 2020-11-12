<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    public const VALIDATION_RULE_STORE = [
        'delivery_comp_id' => ['required','numeric'],
        'merchant_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
        'merchant_id' => ['required','numeric'],
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
        return $this->belongsTo('App\Models\DeliveryComp');
    }

}
