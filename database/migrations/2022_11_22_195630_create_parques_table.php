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
        Schema::create('parques', function (Blueprint $table) {
            $table->id();
            $table->string('parque')->unique();
            $table->string('calle');
            $table->string('estado');
            $table->string('municipio');
            $table->integer('codigo');
            $table->unsignedBigInteger('status_id')->default(2);
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parques');
    }
};
