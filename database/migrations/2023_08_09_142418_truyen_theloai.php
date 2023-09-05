<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TruyenTheloai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen_theloai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_truyen');
            $table->unsignedBigInteger('id_theloai');

            $table->foreign('id_truyen')->references('id')->on('truyen')->onDelete('cascade');
            $table->foreign('id_theloai')->references('id')->on('theloai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen_theloai');
    }
}
