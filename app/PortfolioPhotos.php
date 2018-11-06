<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhotos extends Model
{
    public $table="portfolio_photos";
    public $primaryKey='id';

    protected $fillable = ['url'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
