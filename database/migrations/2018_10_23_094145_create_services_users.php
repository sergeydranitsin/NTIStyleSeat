<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('users_services', function (Blueprint $table){
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('duration_min');
            $table->decimal('price',10,2);
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
        Schema::dropIfExists('services');
        Schema::dropIfExists('users_services');
    }
}
