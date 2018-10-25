<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table='users';
    public $primaryKey='id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'second_name', 'mobile_phone', 'email', 'password', 'is_business', 'social_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function get_profile_data(){
        return $this->belongsTo('App\Profile_data', 'user_id', 'id');
    }

    public function get_weekly_worktime(){
        return $this->belongsTo('App\Weekly_worktime', 'user_id', 'id');
    }

    public function get_vocation(){
        return $this->belongsTo('App\Vocation', 'user_id', 'id');
    }

    public function get_ppointments(){
        return $this->belongsTo('App\Appointments', 'client_id', 'id');
    }


}
