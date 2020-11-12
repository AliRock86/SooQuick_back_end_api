<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }
    public function orderInstruction()
    {
        return $this->hasMany('App\Models\OrderInstruction');
    }
}
