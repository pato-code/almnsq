<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonuthToActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$table->integer('mosque_id')->unsigned()->nullable();
        //            $table->foreign('mosque_id')->references('id')->on('mosques');
        Schema::table('activities', function($table) {
            $table->integer('mounth_id')->unsigned()->nullable();
            $table->foreign('mounth_id')->references('id')->on('mounths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
