<?php

namespace Nanissa\UserManagement\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserAddressesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
