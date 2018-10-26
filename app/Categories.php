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
        return $this->belongsTo('App\Services', 'id', 'category_id');
    }
}
