<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ScoreBoard')->nullable();
            $table->integer('Winner')->nullable();
            $table->integer('Team_1');
            $table->integer('Team_2');
            $table->string('Placement');
            $table->integer('Round');
            $table->integer('Strikes');
            $table->integer('Spares');
            $table->integer('Innings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match');
    }
}
