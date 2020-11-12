<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    public const VALIDATION_RULE_STORE = [
        'source_id' => ['required','numeric'],
        'destination_id' => ['required','numeric'],
    ];

    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'source_id' => ['required','numeric'],
        'destination_id' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function source()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function destination()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function wallet()
    {
        return $this->hasMany('App\Models\Wallet');
    }

}
