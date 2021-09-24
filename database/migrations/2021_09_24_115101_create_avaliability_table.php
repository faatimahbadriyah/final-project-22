<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliability', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time');
            $table->integer('price');
            $table->string('status');
            $table->unsignedInteger('lapangan_id');
            $table->foreign('lapangan_id')->references('id')->on('lapangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliability');
    }
}