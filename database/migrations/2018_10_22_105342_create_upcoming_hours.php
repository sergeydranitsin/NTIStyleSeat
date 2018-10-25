<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpcomingHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcoming_hours',function (Blueprint $table){
            $table->increments('user_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('start_break_time');
            $table->time('end_dreak_time');
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
        Schema::dropIfExists('upcoming_hours');
    }
}
