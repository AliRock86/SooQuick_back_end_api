<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permision extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

}
