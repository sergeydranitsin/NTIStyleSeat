<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointments extends Model
{
    use Notifiable;
    public $table = 'appointments';
    public $primaryKey = 'id';

    protected $fillable = [
        'client_id', 'user_service_id', 'start_time', 'note'
    ];

    public function client(){
        return $this->belongsTo('App\ClientUser', 'user_id', 'id');
    }

    public function user_services(){
        return $this->hasOne('App\Users_services', 'user_service_id', 'id');
    }
}
