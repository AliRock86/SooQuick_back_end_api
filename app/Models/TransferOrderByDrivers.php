<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferOrderByDrivers extends Model
{
    use HasFactory;
    public const VALIDATION_RULE_STORE = [
        'order_id' => ['required','numeric'],
        'still_has_it' => [],
        'driver_id' => ['required','numeric'],
    ];
    // still_has_it may be increment by one best chosen

    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'order_id' => ['required','numeric'],
        'still_has_it' => [],
        'driver_id' => ['required','numeric'],
        'status_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

}
