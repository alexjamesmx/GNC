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
        Schema::create('rep_enterprises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspeccion_id');
            $table->string('extintores_no');
            $table->string('extintores_tipo_agente');
            $table->string('extintores_fecha_vencimiento');
            $table->string('extintores_presion');
            $table->string('extintores_aro_seguridad');
            $table->string('extintores_ubicacion');
            $table->string('lamparas_no');
            $table->string('lamparas_estado');
            $table->string('lamparas_faltante');
            $table->string('lamparas_emergencia_no');
            $table->string('lamparas_emergencia_estado');
            $table->string('lamparas_emergencia_faltante');
            $table->string('senalizacion_seguridad');
            $table->string('senalizacion_seguridad_estado');
            $table->string('senalizacion_seguridad_faltante');
            $table->string('senalizacion_observaciones');
            $table->string('pintura_estado');
            $table->string('pintura_requiere');
            $table->string('herreria_estado');
            $table->string('herreria_requiere');
            $table->string('herreria_observaciones');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->string('img6')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('inspeccion_id')->references('id')->on('inspecciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rep_enterprises');
    }
};
