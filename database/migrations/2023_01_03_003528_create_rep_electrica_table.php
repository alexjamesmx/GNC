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
        Schema::create('rep_electrica', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspeccion_id');
            $table->tinyInteger('disasolve_req');
            $table->tinyText('disasolve_cantidad');

            $table->tinyInteger('mt_limpieza_req');

            $table->tinyInteger('ten_media_soporteria');
            $table->tinyInteger('ten_media_soporteria_edo');
            $table->tinyText('ten_media_soporteria_faltante');

            $table->tinyInteger('sis_tierra');
            $table->tinyInteger('sis_tierra_edo');
            $table->tinyText('sis_tierra_faltante');

            $table->tinyInteger('conex_tierra');
            $table->tinyInteger('conex_tierra_edo');
            $table->tinyText('conex_tierra_faltante');

            $table->tinyInteger('sellado_ducteria');
            $table->tinyInteger('sellado_ducteria_estado');
            $table->tinyText('sellado_ducteria_faltante');

            $table->text('mt_observaciones');

            $table->tinyText('tipo_canalizacion');

            $table->tinyInteger('torni');
            $table->tinyText('torni_cantidad');
            $table->tinyText('torni_limpieza');
            $table->tinyText('torni_soporteria');
            $table->tinyInteger('torni_edo');
            $table->tinyText('torni_faltante');

            $table->tinyInteger('ten_baja_soporteria');
            $table->tinyInteger('ten_baja_soporteria_edo');
            $table->tinyText('ten_baja_soporteria_faltante');

            $table->tinyText('mb_limpieza_req');

            $table->text('mb_observaciones');


            $table->tinyText('int_no');
            $table->tinyText('int_cantidad');
            $table->tinyInteger('int_edo');
            $table->tinyText('int_limpieza');
            $table->tinyText('int_torni');

            $table->tinyInteger('int_senalizacion');
            $table->tinyInteger('int_senalizacion_edo');
            $table->tinyText('int_senalizacion_faltante');

            $table->tinyInteger('circuitos');
            $table->tinyInteger('circuitos_edo');
            $table->tinyText('circuito_faltante');

            $table->tinyText('disponible');
            $table->tinyInteger('disponible_edo');
            $table->tinyText('disponible_faltante');

            $table->tinyText('bt_observaciones');

            $table->tinyInteger("acc_subterraneo_edo");
            $table->tinyText("codos");
            $table->tinyInteger("codos_edo");
            $table->tinyText("terminales");
            $table->tinyInteger('terminales_edo');

            $table->tinyText('fusibles');
            $table->tinyText('fusibles_capacidad');
            $table->tinyInteger('fusibles_edo');
            $table->tinyText('fusibles_faltante');

            $table->tinyText('mecanismo');
            $table->tinyInteger('mecanismo_edo');
            $table->tinyText('mecanismo_danado');

            $table->tinyText('se_cable_acomodo');

            $table->tinyText('mabete');
            $table->tinyInteger('mabete_edo');
            $table->tinyText('mabete_faltante');

            $table->tinyText('se_observaciones');

            $table->tinyText('bt_cableado_cable_acomodo');
            $table->tinyInteger('bt_cableado_conexiones_edo');
            $table->tinyText('bt_cableado_conexiones_faltante');
            $table->tinyText('bt_cableado_observaciones');

            $table->tinyText('trans_vab');
            $table->tinyText('trans_vbc');
            $table->tinyText('trans_vab2');
            $table->tinyText('trans_van');
            $table->tinyText('trans_vbn');
            $table->tinyText('trans_vcn');

            $table->tinyText('int_princ_vab');
            $table->tinyText('int_princ_vbc');
            $table->tinyText('int_princ_vab2');
            $table->tinyText('int_princ_van');
            $table->tinyText('int_princ_vbn');
            $table->tinyText('int_princ_vcn');

            $table->tinyText('int_princ_corriente_la');
            $table->tinyText('int_princ_corriente_lb');
            $table->tinyText('int_princ_corriente_lc');
            $table->tinyText('int_princ_corriente_ln');

            $table->tinyText('img1');
            $table->tinyText('img2');
            $table->tinyText('img3');
            $table->tinyText('img4')->nullable();
            $table->tinyText('img5')->nullable();
            $table->tinyText('img6')->nullable();
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
        Schema::dropIfExists('rep_electrica');
    }
};
