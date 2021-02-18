<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return  [ 
        'id'=>$this->id,
        'product_price'=>$this->product_price,
        'customer'=>['id'=>$this->customer->id,'customer_name'=>$this->customer->customer_name,'customer_phone_1'=>$this->customer->customer_phone_1,'customer_phone_2'=>$this->customer->customer_phone_2,'region'=> new RegionResource($this->deliveryComp->region)],
        'merchant'=>['id'=>$this->merchant->id,'merchant_barnd_name'=>$this->merchant->merchant_barnd_name,'merchant_email'=>$this->merchant->merchant_email,'merchant_phone'=>$this->merchant->merchant_phone,'region'=> new RegionResource($this->deliveryComp->region)],
        'delivery_comp'=>['id'=>$this->deliveryComp->id,'delivery_comp_barnd_name'=>$this->deliveryComp->delivery_comp_barnd_name,'delivery_comp_email'=>$this->deliveryComp->delivery_comp_email,'delivery_comp_phone'=>$this->deliveryComp->delivery_comp_phone],
        'DeliveryDriver'=>new DeliveryDriversResource($this->DeliveryDriver),
        'status'=>['id'=>$this->status->id,'status_name'=>$this->status->status_name,'status_name_ar'=>$this->status->status_name_ar,'status_color'=>$this->status->status_color],
        'created_at'=>$this->created_at->format('d-m-Y')
        ];
    }
}
