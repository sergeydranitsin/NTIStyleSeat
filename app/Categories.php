<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categories extends Model
{
    use Notifiable;
    public $table = 'categories';
    public $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function service(){
        return $this->hasMany('App\Services', 'category_id', 'id');
    }
}
