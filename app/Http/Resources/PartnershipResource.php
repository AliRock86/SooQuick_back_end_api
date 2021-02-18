<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnershipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
      [
      'id'=>$this->id,
      'delivery_comp'=>['id'=>$this->deliveryComp->id,'delivery_comp_barnd_name'=>$this->deliveryComp->delivery_comp_barnd_name,'delivery_comp_email'=>$this->deliveryComp->delivery_comp_email,'delivery_comp_phone'=>$this->deliveryComp->delivery_comp_phone,'region'=> new RegionResource($this->deliveryComp->region)],
      'status'=>['id'=>$this->status->id,'status_name'=>$this->status->status_name,'status_name_ar'=>$this->status->status_name_ar,'status_color'=>$this->status->status_color],
      'merchant'=>['id'=>$this->merchant->id,'merchant_barnd_name'=>$this->merchant->merchant_barnd_name,'merchant_phone'=>$this->merchant->merchant_phone ,'merchant_email'=>$this->merchant->merchant_email,'merchant_description'=>$this->merchant->merchant_description,'region'=> new RegionResource($this->deliveryComp->region)],
      'discount_value'=>$this->discount_value

      
      ];
    }
}
