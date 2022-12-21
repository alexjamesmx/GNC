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
        Schema::create('anomalias', function (Blueprint $table) {
            $table->id();
            $table->string('urgencia');
            $table->string('marca');
            $table->string('modelo');
            $table->string('medidas');
            $table->string('descripcion');
            $table->string('imagen');
            $table->unsignedBigInteger('inspeccion_id');
            $table->unsignedBigInteger('tipo_inspeccion_id');
            $table->foreign('inspeccion_id')->references('id')->on('inspecciones')->onDelete('cascade');
            $table->foreign('tipo_inspeccion_id')->references('id')->on('tipo_inspeccion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anomalias');
    }
};
