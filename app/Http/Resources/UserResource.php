<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private $token;

    public function __construct($resource , $token = null){
        parent::__construct($resource);
        $this->resource = $resource;
        $this->token = $token;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sucess' => true,
            'data' => [
                'token' => $this->token,
                'user_name' => $this->full_name,
                'user_phone' => $this->user_phone,
                'user_image' => ($this->image) ? $this->image->image_url : null,
                'user_email' => ($this->user_email) ? $this->user_email:null ,
                'user_status' => $this->status->status_name,
                'user_role' => $this->role->role_name,
            ],
        ];
    }
}
