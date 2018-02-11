<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailCaughtForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_caught', function (Blueprint $table) {
            //
             $table->foreign("fish_id")->references("id")->on("fish");
           
             $table->foreign("caught_id")->references("id")->on("caught");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_caught', function (Blueprint $table) {
            //
        });
    }
}
