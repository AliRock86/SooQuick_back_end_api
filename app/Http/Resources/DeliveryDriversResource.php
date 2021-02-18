<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryDriversResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id'=>$this->id,
        'name'=>$this->Driver->User->full_name,
        'driver_phone'=>$this->Driver->driver_phone,
        'order'=>
        [ 
            'id'=>$this->order->id,
            'product_price'=>$this->order->product_price,
            'customer'=>['id'=>$this->order->customer->id,'customer_name'=>$this->order->customer->customer_name,'customer_phone_1'=>$this->order->customer->customer_phone_1,'customer_phone_2'=>$this->order->customer->customer_phone_2,'region'=> new RegionResource($this->order->deliveryComp->region)],
            'merchant'=>['id'=>$this->order->merchant->id,'merchant_barnd_name'=>$this->order->merchant->merchant_barnd_name,'merchant_email'=>$this->order->merchant->merchant_email,'merchant_phone'=>$this->order->merchant->merchant_phone,'region'=> new RegionResource($this->order->deliveryComp->region)],
            'delivery_comp'=>['id'=>$this->order->deliveryComp->id,'delivery_comp_barnd_name'=>$this->order->deliveryComp->delivery_comp_barnd_name,'delivery_comp_email'=>$this->order->deliveryComp->delivery_comp_email,'delivery_comp_phone'=>$this->order->deliveryComp->delivery_comp_phone],
            'status'=>['id'=>$this->order->status->id,'status_name'=>$this->order->status->status_name,'status_name_ar'=>$this->order->status->status_name_ar],
            'created_at'=>$this->order->created_at->format('d-m-Y')
        ],
        
        //new OrderResource($this->order),
        'region'=> new RegionResource($this->Driver->region)
    ];
    }
}
