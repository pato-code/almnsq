<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMosqueToSermons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sermons', function($table) {
            $table->dropColumn('mosque');
            $table->integer('mosque_id')->unsigned()->nullable();
            $table->foreign('mosque_id')->references('id')->on('mosques');
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
