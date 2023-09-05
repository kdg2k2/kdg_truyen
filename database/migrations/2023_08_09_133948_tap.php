<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tentap');
            $table->unsignedBigInteger('id_truyen');
            $table->longText('path');
            $table->timestamps();

            $table->foreign('id_truyen')->references('id')->on('truyen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tap');
    }
}
