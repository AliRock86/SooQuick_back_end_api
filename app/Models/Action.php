<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];
    
    public function instruction()
    {
        return $this->belongsTo('App\Models\Instruction');
    }

    public function orderAcation()
    {
        return $this->hasMany('App\Models\OrderAcation');
    }

}
