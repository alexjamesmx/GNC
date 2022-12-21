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
        Schema::create('subestaciones', function (Blueprint $table) {
            $table->id();
            $table->string('subestacion');;
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('enterprise_id');
            $table->unsignedBigInteger('parque_id');
            $table->unsignedBigInteger('status_id')->default(2);
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('parque_id')->references('id')->on('parques')->onDelete('cascade');
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
        Schema::dropIfExists('subestaciones');
    }
};
