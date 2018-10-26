<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vocation extends Model
{
    use Notifiable;
    public $table= 'vocation';
    public $primaryKey = 'user_id';

    protected $fillable = [
        'start_date', 'end_date'
    ];

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
