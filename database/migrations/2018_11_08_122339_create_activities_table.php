<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('request_name');
            $table->date('day');
            $table->integer('mosque_id')->unsigned()->nullable();
            $table->foreign('mosque_id')->references('id')->on('mosques');
            $table->integer('imam_id')->unsigned()->nullable();
            $table->foreign('imam_id')->references('id')->on('users');
            $table->integer('week_id')->unsigned()->nullable();
            $table->foreign('week_id')->references('id')->on('weeks');


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
        Schema::dropIfExists('activities');
    }
}
