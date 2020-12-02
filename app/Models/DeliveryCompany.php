<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCompany extends Model
{
    public const VALIDATION_RULE_STORE = [
        'user_id' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'delivery_comp_phone' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
    ];

    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'company_id' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'delivery_comp_phone' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'status_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function partnership()
    {
        return $this->hasMany('App\models\Partnership');
    }

    public function transferredOrders_from()
    {
        return $this->hasMany('App\Models\TransferredOrders','from_comp_id');
    }

    public function transferredOrders_to()
    {
        return $this->hasMany('App\Models\TransferredOrders','to_comp_id');
    }

}
