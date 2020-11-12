<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;
    public const VALIDATION_RULE_STORE = [
        'user_id' => ['required','numeric'],
        'transaction_id' => ['required','numeric'],
        'value' => [],
        'added' => [],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'user_id' => ['required','numeric'],
        'transaction_id' => ['required','numeric'],
        'value' => [],
        'added' => [],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }

}
