<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Services extends Model
{
    use Notifiable;
    public $table = 'services';
    public $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'name'
    ];

    public function users_services(){
        return $this->hasMany('App\Users_services', 'service_id', 'id');
    }

    public function categories(){
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }
}
