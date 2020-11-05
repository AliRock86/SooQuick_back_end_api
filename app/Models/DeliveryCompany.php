<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCompany extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

}
