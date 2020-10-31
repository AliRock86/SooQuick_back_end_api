<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
}
