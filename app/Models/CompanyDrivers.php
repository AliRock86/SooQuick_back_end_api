<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDrivers extends Model
{
    use HasFactory;
    public const VALIDATION_RULE_STORE = [
       // 'delivery_comp_id' => ['required','numeric'],
        'driver_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function deliveryComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
}
