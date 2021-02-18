<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyDriversResource extends JsonResource
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
        'driver'=>['id'=>$this->driver->id,'name'=>$this->driver->user->full_name,'driver_phone'=>$this->driver->driver_phone,'car_number'=>$this->driver->car_number,'image'=>$this->driver->user->image,'car_owner_name'=>$this->driver->car_owner_name,'region'=>new RegionResource($this->driver->region)],
        'status'=>['id'=>$this->status->id,'status_name'=>$this->status->status_name,'status_name_ar'=>$this->status->status_name_ar,'status_color'=>$this->status->status_color],
       
      ];
    }
}
