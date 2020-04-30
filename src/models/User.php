<?php

namespace Nanissa\Authentication;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Parental\HasChildren;

class User extends Authenticatable
{
    use Notifiable;
    use HasChildren;
    use HasApiTokens;

    /**
     * @inheritDoc
     */
    public function resolveChildRouteBinding($childType, $value, $field)
    {
        // TODO: Implement resolveChildRouteBinding() method.
    }
}
