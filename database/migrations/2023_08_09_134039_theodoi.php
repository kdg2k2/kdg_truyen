<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Theodoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theodoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_truyen');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_truyen')->references('id')->on('truyen')->onDelete('cascade');
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
        Schema::dropIfExists('theodoi');
    }
}
