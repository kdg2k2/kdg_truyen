<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TruyenTacgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen_tacgia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_truyen');
            $table->unsignedBigInteger('id_tacgia');

            $table->foreign('id_truyen')->references('id')->on('truyen')->onDelete('cascade');
            $table->foreign('id_tacgia')->references('id')->on('tacgia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen_tacgia');
    }
}
