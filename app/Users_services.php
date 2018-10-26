<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Users_services extends Model
{
    use Notifiable;
    public $table = 'users_services';
    public $primaryKey = 'id';

    protected $fillable = [
        'service_id', 'user_id', 'duration_min', 'price'
    ];

    public function appointments(){
        return $this->belongsTo('App\Appointments', 'id', 'user_service_id');
    }

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function services(){
        return $this->hasMany('App\Services', 'service_id', 'id');
    }
}