<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferredOrders extends Model
{
    use HasFactory;
    public const VALIDATION_RULE_STORE = [
        'order_id' => ['required','numeric'],
        'from_comp_id' => ['required','numeric'],
        'to_comp_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'order_id' => ['required','numeric'],
        'from_comp_id' => ['required','numeric'],
        'to_comp_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function fromComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany');
    }

    public function toComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany');
    }

}
