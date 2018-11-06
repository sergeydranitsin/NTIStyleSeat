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
        return $this->hasMany('App\Appointments', 'user_service_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function service(){
        return $this->belongsTo('App\Services', 'service_id', 'id');
    }
}
