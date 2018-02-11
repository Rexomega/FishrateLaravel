<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketDetailForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_detail', function (Blueprint $table) {
            //
            $table->foreign("fish_id")->references("id")->on("fish");
            $table->foreign("market_id")->references("id")->on("market");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_detail', function (Blueprint $table) {
            //
        });
    }
}
