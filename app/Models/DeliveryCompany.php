<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCompany extends Model
{
    public const VALIDATION_RULE_STORE = [
     
        'delivery_comp_barnd_name' => ['required'],
        'delivery_comp_phone' => ['required','numeric'],
        'delivery_comp_barnd_name' => ['required'],
        'full_name' => ['required'],
        'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
        'password' => ['required','min:8','confirmed'],
        'images' => ['array'],
    ];

    public const VALIDATION_RULE_UPDATE = [
      
      
        'delivery_comp_barnd_name' => ['required'],
        'delivery_comp_phone' => ['numeric'],
        'delivery_comp_barnd_name' => ['required'],
      
        'full_name' => ['required'],
       // 'user_phone' => ['required','unique:users'],
        'region_id' => ['required'],
     
        'images' => ['array'],
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
        return $this->hasOne('App\models\Partnership','delivery_comp_id');
    }
    public function DeliveryPrice()
    {
        return $this->hasMany('App\models\DeliveryPrice','delivery_comp_id');
        
    }


    public function drivers()
    {
        return $this->hasMany('App\models\CompanyDrivers','delivery_comp_id');
        
    }


    public function region()
    {
        return $this->belongsTo('App\Models\Region');
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
