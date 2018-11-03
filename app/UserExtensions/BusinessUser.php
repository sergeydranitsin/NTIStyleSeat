<?php

namespace App\UserExtensions;

use App\User;

class BusinessUser extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BusinessScope);
    }

    public function appointments(){
        return $this->hasManyThrough('App\Appointments', 'App\Users_Services', 'user_id', 'user_service_id');
    }

}
