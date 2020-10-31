<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at','region_id','addressable_id'
    ];

    public function addressable(){

        return $this->morphTo();
    }
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

}
