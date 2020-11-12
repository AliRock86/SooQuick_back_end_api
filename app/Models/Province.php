<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function region()
    {
        return $this->hasMany('App\Models\Region');
    }

}
