<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryDrivers extends Model
{

    public const VALIDATION_RULE_STORE = [
  //      'id' => ['required','numeric'],
        'driver_id' => ['required','numeric'],
        'order_id' => ['required','array'],
        'status_id' => ['required','numeric'],
    ];

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

}
