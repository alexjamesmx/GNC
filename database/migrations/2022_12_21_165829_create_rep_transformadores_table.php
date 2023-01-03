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
        Schema::create('rep_transformadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspeccion_id');
            $table->string('marca');
            $table->string('capacidad');
            $table->string('neutro');
            $table->string('tension');
            $table->string('impedancia');
            $table->string('a');
            $table->string('c');
            $table->string('lts_aceite');
            $table->string('conex_primario');
            $table->string('conex_secundario');
            $table->string('fecha_fabricacion');
            $table->string('aceite');
            $table->string('peso_total');
            $table->string('limpieza');
            $table->string('indicador_nivel');
            $table->string('indicador_temperatura');
            $table->string('indicador_temperatura_max');
            $table->string('valvula_alivio');
            $table->string('valvula_llenado');
            $table->string('valvula_drenado');
            $table->string('valvula_muestreo');
            $table->string('cambiador_derivaciones');
            $table->string('pintura_estado');
            $table->string('tierra_neutro');
            $table->string('tierra_tanque');
            $table->string('tierra_codos');
            $table->string('tierra_insertos');
            $table->string('boquillas_h1');
            $table->string('boquillas_h2');
            $table->string('boquillas_h3');
            $table->string('boquillas_x0');
            $table->string('boquillas_x1');
            $table->string('boquillas_x2');
            $table->string('boquillas_x3');
            $table->string('observaciones');
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
        Schema::dropIfExists('rep_transformadores');
    }
};
