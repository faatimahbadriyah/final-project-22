<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_09_16_122927_create_profiles_table.php
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
=======
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
>>>>>>> 9254790dc42f0f785d168803d1260f18eb94bcb1:database/migrations/2021_09_16_122927_create_profile_table.php
            $table->string('gender');
            $table->longText('address');
            $table->string('phone');
            $table->string('photo');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}