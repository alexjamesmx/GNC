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
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tecnico_responsable');
            $table->unsignedBigInteger('asignado_por');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin')->nullable();
            $table->unsignedBigInteger('parque_id');
            $table->unsignedBigInteger('enterprise_id');
            $table->unsignedBigInteger('subestacion_id');
            $table->unsignedBigInteger('status_id')->default(4);
            $table->foreign('tecnico_responsable')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('asignado_por')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parque_id')->references('id')->on('parques')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('subestacion_id')->references('id')->on('subestaciones')->onDelete('cascade');
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
        Schema::dropIfExists('inspecciones');
    }
};
