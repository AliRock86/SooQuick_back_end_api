<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInstruction extends Model
{

    public const VALIDATION_RULE_STORE = [
        'order_id' => ['required','numeric'],
        'instruction_id' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'order_id' => ['required','numeric'],
        'instruction_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function instruction()
    {
        return $this->belongsTo('App\Models\Instruction');
    }
}
