<?php

namespace Nanissa\UserManagement\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'user_id'   =>  $this->id,
            'first_name'    =>  $this->first_name,
            'email'    =>  $this->email,
            'country'    =>  [
                'name'  => $this->country->name,
                'iso'   =>  $this->country->iso
            ],
        ];
    }
}
