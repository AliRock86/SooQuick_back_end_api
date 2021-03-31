<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillsOrders extends Model
{
    protected $table = 'bill_order';
    use HasFactory;

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

}
