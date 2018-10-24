<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile_data extends Model
{
    use Notifiable;
    public $table="profile_data";
    public $primaryKey='user_id';

    protected $fillable = [
        'avatar', 'header', 'photos', 'coords', 'address'
    ];

    public function user(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
}
