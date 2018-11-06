<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Weekly_worktime extends Model
{
    use Notifiable;
    public $table = 'weekly_worktime';
    public $primaryKey = 'user_id';

    protected $fillable = [
        'weekday', 'start_time','end_time', 'start_break_time','end_break_time'
    ];

    public function user(){
        return $this->belongsTo('App\BusinessUser', 'user_id', 'id');
    }
}
