<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'customer_name' => ['required'],
        'customer_phone_1' => ['required','min:11'],
    ];
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

}
