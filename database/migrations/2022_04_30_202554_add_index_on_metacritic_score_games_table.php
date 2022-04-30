<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexOnMetacriticScoreGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games',function (Blueprint $table){
            $table->index('metacritic_score','games_metacritic_score_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games',function (Blueprint $table){
            $table->dropIndex('games_metacritic_score_index');
        });
    }
}
