<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Collections\OrderCollection;
class BillsResource extends JsonResource
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
            'name'=>$this->name,
            'order_number'=>$this->order_number,
            'delivery_cost'=>$this->delivery_cost,
            'totlal_cost'=>$this->totlal_cost,
            'orders'=>new OrderCollection($this->orders),
            'status'=>['id'=>$this->status->id,'status_name'=>$this->status->status_name,'status_name_ar'=>$this->status->status_name_ar,'status_color'=>$this->status->status_color],
            'user'=>['id'=>$this->user->id,'name'=>$this->user->full_name,'email'=>$this->user->user_email,'phone'=>$this->user->user_phone ],
           // 'delivery_comp'=>['id'=>$this->deliveryComp->id,'delivery_comp_barnd_name'=>$this->deliveryComp->delivery_comp_barnd_name,'delivery_comp_email'=>$this->deliveryComp->delivery_comp_email,'delivery_comp_phone'=>$this->deliveryComp->delivery_comp_phone],

        ];
       
    }
}
