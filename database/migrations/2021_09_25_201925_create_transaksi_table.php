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
            $table->bigIncrements('id');
            $table->string('nama_tim');
            $table->integer('durasi');
            $table->integer('total_bayar');
            $table->string('file_bayar')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jadwal_id')->references('id')->on('jadwal');
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
        Schema::dropIfExists('transaksi');
    }
}