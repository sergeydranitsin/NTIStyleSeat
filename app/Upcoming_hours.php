<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Upcoming_hours extends Model
{
    use Notifiable;
    public $table = 'upcoming_hours';
    public $primaryKey = ' user_id';

    protected $fillable = [
        'date', 'start_time', 'end_time', 'start_break_time', 'end_break_time'
    ];

    public function user(){
        return $this->hasOne('App\User', 'user_id', 'id');
    }
}
