<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public const VALIDATION_RULE_STORE = [
       
        'merchant_barnd_name' => ['required'],
        'merchant_phone' => ['required','numeric','unique:merchants'],
        'facebook_url' => [],
        'full_name' => ['required'],
        'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
        'password' => ['required','min:8','confirmed'],
        'images' => ['array'],
    ];
    public const VALIDATION_RULE_UPDATE = [
   //    'user_id' => ['required','numeric'],
        'merchant_barnd_name' => ['required'],
        'merchant_phone' => ['required','numeric','unique:merchants'],
        'facebook_url' => [],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function offer()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function partnership()
    {
        return $this->hasMany('App\models\Partnership');
    }

}
