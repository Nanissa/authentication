<?php

namespace Nanissa\UserManagement\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class UsersResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($item) {
            return [
                'user_id'       =>  $item->id,
                'first_name'    =>  $item->first_name,
                'email'         =>  $item->email,
                'country_id'    =>  $item->country_id,
                'country'       =>  [
                    'name'  => $item->country->name,
                    'code'   =>  $item->country->code
                ],
            ];
        });

        return $this->collection->sortBy('user_id');

    }
}
