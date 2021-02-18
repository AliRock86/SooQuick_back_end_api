<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            
                'id' => $this->id,
                'car_number' => $this->car_number,
                'region'=>new RegionResource($this->region),
                'car_owner_name' => $this->car_owner_name,
                'car_owner_type' => $this->car_owner_type,
                'driver_description' =>$this->driver_description,
                'driver_phone' =>$this->driver_phone ,
                'status_id'=>$this->status,
                'image'=>$this->user->image

           
        ];
    }
}
