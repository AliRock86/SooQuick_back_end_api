<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $guarded = [];
    public const VALIDATION_RULE_STORE = [
         'order_number' => ['required','numeric'],
       //  '//user_type' => ['required','numeric'],
         'orders_id' => ['required','array'],
         'delivery_cost' => ['required','numeric'],
     //    'delivery_comp_id' => ['required','numeric'],
         'totlal_cost' => ['required','numeric'],
         'user_id' => ['required','numeric'],
         //'status_id' => ['required','numeric'],
     ];


     public const VALIDATION_RULE_UPDATE = [
        'order_number' => ['required','numeric'],
        //'user_type' => ['required','numeric'],
        'delivery_cost' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
        'totlal_cost' => ['required','numeric'],
        'user_id' => ['required','numeric'],
       // 'status_id' => ['required','numeric'],
    ];

    public function deliveryComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany','delivery_comp_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }






    protected $hidden = [
        'updated_at', 'created_at'
    ];

}
