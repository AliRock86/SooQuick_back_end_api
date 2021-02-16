<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryCompanyResource extends JsonResource
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
        'delivery_comp_barnd_name'=>$this->delivery_comp_barnd_name,
        'delivery_comp_email'=>$this->delivery_comp_email,
        'delivery_comp_phone'=>$this->delivery_comp_phone,
        'delivery_comp_description'=>$this->delivery_comp_description,
        'delivery_comp_email'=>$this->delivery_comp_email,
        'status'=>$this->status,
        'user'=>new UserResource($this->user)


        ];
        
    }
}
