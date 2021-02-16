<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public const VALIDATION_RULE_STORE = [
        'customer_name' => ['required'],
        'customer_phone_1' => ['required','min:11'],
        'customer_phone_2' => ['min:11'],
    ];
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }


    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }


}
