<?php

namespace App;

use App;
use Illuminate\Notifications\Messages\MailMessage;
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

    public function profile_data(){
        return $this->hasOne('App\Profile_data', 'user_id', 'id');
    }

    public function portfolio_photos(){
        return $this->hasMany('App\PortfolioPhotos', 'user_id', 'id');
    }

    public function weekly_worktime(){
        return $this->hasMany('App\Weekly_worktime', 'user_id', 'id');
    }

    public function vocation(){
        return $this->hasOne('App\Vocation', 'user_id', 'id');
    }

    public function upcoming_hours(){
        return $this->hasMany('App\Upcoming_hours', 'user_id', 'id');
    }

    public function users_services(){
        return $this->hasMany('App\Users_services', 'user_id', 'id');
    }
	public function sendPasswordResetNotification($token)
    {
        $this->notify(new App\Notifications\ResetPassword($token));
    }
}
