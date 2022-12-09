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
            $table->string('fax')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('status_id')->default(2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parque_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parque_id')->references('id')->on('parques')->onDelete('cascade');
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
