<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAcation extends Model
{
    public const VALIDATION_RULE_STORE = [
        'order_id' => ['required','numeric'],
        'action_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'order_id' => ['required','numeric'],
        'action_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function action()
    {
        return $this->belongsTo('App\Models\action');
    }

}
