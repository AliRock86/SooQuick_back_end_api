<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{

    protected $guarded = [];


    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function status()
    {
        return $this->hasMany('App\Models\Status');
    }

}
