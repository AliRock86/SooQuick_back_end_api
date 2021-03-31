<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Builder;
class Order extends Model
{
    public const VALIDATION_RULE_STORE = [
        
        'customer_id' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
        'customer_id' => ['required','numeric'],
        'delivery_price_id' => ['required','numeric'],
        'product_price' => ['required','numeric'],
        // 'serial_number' => ['required'],
       
    ];
    public const VALIDATION_RULE_UPDATE = [
        'customer_id' => ['required','numeric'],
        'delivery_comp_id' => ['required','numeric'],
        'customer_id' => ['required','numeric'],
        'delivery_price_id' => ['required','numeric'],
        'product_price' => ['required','numeric'],
    ];

    public function BillsOrders()
    {
        return $this->hasMany('App\Models\BillsOrders');
    }

    protected $guarded = [];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }

    public function deliveryComp()
    {
        return $this->belongsTo('App\Models\DeliveryCompany','delivery_comp_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function scopeBetweenDate(Builder $query,$date): Builder

      {
       
        $date=explode("_",$date);
       return $query->whereDate('created_at', [$date[0],$date[1]]);
    }
    

    public function DeliveryDriver()
    {
        return $this->hasOne('App\Models\DeliveryDrivers');
    }


    public function deliveryPrice()
    {
        return $this->belongsTo('App\Models\DeliveryPrice');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function orderAcation()
    {
        return $this->hasMany('App\Models\OrderAcation');
    }

    public function orderInstruction()
    {
        return $this->hasMany('App\Models\OrderInstruction');
    }

    public function transferOrderByDrivers()
    {
        return $this->hasMany('App\Models\TransferOrderByDrivers');
    }

    public function transferredOrders()
    {
        return $this->hasMany('App\Models\TransferredOrders');
    }

}
