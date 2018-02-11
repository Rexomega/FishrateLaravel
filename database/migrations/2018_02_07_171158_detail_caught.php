<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailCaught extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_caught', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("fish_id")->unsigned();
            $table->integer("caught_id")->unsigned();
            $table->integer("fish_caught");
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
        Schema::drop('detail_caught');
    }
}
