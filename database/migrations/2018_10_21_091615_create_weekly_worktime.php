<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyWorktime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_worktime', function (Blueprint $table){
           $table->increments('user_id');
           $table->string('weekday');
           $table->time('start_time');
           $table->time('end_time');
           $table->time('start_break_time');
           $table->time('end_break_time');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_worktime');
    }
}
