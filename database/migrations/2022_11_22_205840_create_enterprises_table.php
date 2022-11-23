<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('enterprise');
            $table->string('razon_social');
            $table->string('rfc')->unique();
            $table->string('address');
            $table->string('ciudad');
            $table->string('cp');
            $table->string('regimen_fiscal');
            $table->string('phone')->unique();
            $table->string('fax');
            $table->string('location');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enterprises');
    }
};
