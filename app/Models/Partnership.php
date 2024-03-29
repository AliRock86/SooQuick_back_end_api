<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    public const VALIDATION_RULE_STORE = [
        'delivery_comp_id' => ['required','numeric'],
<<<<<<< HEAD
        'merchant_id' => ['required','numeric'],
        'status_id' => ['required','numeric'],
=======
        'discount_value'=> ['numeric']
        // 'merchant_id' => ['required','numeric'],
>>>>>>> 2bc26ce8f7752e0898979a5bd0e99678c22505f4
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
<<<<<<< HEAD
        'merchant_id' => ['required','numeric'],
        'status_id' => ['required','numeric'],
=======
        'discount_value'=> ['numeric']
        // 'merchant_id' => ['required','numeric'],
>>>>>>> 2bc26ce8f7752e0898979a5bd0e99678c22505f4
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
        return $this->belongsTo('App\Models\DeliveryCompany');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

}
