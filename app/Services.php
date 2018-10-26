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
        return $this->belongsTo('App\Users_services', 'id', 'service_id');
    }

    public function categories(){
        return $this->hasMany('App\Categories', 'category_id', 'id');
    }
}
