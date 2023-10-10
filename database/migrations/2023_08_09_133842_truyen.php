<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Truyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tentruyen');
            $table->text('tenkhac');
            $table->boolean('status');
            $table->longText('mota')->nullable();
            $table->text('path')->nullable();
            $table->bigInteger('view');
            $table->text('slug');
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
        Schema::dropIfExists('truyen');
    }
}
