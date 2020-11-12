<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    public const VALIDATION_RULE_STORE = [
        'user_id' => ['required','numeric'],
        'verify_number' => ['required','numeric'],
    ];
    public const VALIDATION_RULE_UPDATE = [
        'id' => ['required','numeric'],
        'user_id' => ['required','numeric'],
        'verify_number' => ['required','numeric'],
    ];
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
