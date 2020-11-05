<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

}
