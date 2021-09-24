<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tim');
            $table->integer('durasi');
            $table->integer('total_bayar');
            $table->string('status');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('avaliability_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('avaliability_id')->references('id')->on('avaliability');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}