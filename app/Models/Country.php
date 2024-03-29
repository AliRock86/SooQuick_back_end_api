<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $guarded = [];
     
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function province()
    {
        return $this->hasMany('App\Models\Province');
    }

}
