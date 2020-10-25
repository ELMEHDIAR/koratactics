<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_birth');
            $table->string('nationality');
            $table->string('position');
            $table->integer('country_id');
            $table->integer('club_id');
            $table->float('market_value');
            $table->string('image');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade')->onUpdate("cascade"); 
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
        Schema::dropIfExists('players');
    }
}
