<?php

namespace App\UserExtensions;

use App\User;

class ClientUser extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ClientScope);
    }
}
