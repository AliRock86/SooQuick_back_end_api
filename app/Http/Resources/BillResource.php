<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'status'=>['id'=>$this->status->id,'status_name'=>$this->status->status_name,'status_name_ar'=>$this->status->status_name_ar,'status_color'=>$this->status->status_color],
            'merchant'=>['id'=>$this->user->merchant->id,'merchant_barnd_name'=>$this->user->merchant->merchant_barnd_name,'merchant_email'=>$this->user->merchant->merchant_email,'merchant_phone'=>$this->user->merchant->merchant_phone],

           // 'delivery_comp'=>['id'=>$this->deliveryComp->id,'delivery_comp_barnd_name'=>$this->deliveryComp->delivery_comp_barnd_name,'delivery_comp_email'=>$this->deliveryComp->delivery_comp_email,'delivery_comp_phone'=>$this->deliveryComp->delivery_comp_phone],

        ];
       
    }
}
