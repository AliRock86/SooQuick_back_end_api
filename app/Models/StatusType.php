<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
