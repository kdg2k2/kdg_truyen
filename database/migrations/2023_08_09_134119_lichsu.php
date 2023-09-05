<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lichsu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tap');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_tap')->references('id')->on('tap')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichsu');
    }
}
