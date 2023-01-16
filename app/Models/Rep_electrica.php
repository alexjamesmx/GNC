<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rep_electrica extends Model
{
    use HasFactory;


    protected $table = 'rep_electrica';
    public $timestamps = false;
    protected $fillable = [
        'inspeccion_id',
        'disasolve_req',
        'disasolve_cantidad',
        'mt_limpieza_req',
        'ten_media_soporteria',
        'ten_media_soporteria_edo',
        'ten_media_soporteria_faltante',
        'sis_tierra',
        'sis_tierra_edo',
        'sis_tierra_faltante',
        'conex_tierra',
        'conex_tierra_edo',
        'conex_tierra_faltante',
        'sellado_ducteria',
        'sellado_ducteria_edo',
        'sellado_ducteria_faltante',
        'mt_observaciones',
        'tipo_canalizacion',

        'torni',
        'torni_cantidad',
        'torni_limpieza',
        'bt_soporteria',
        'bt_soporteria_edo',
        'bt_soporteria_faltante',
        'mb_observaciones',
        'int_no',
        'int_limpieza_cantidad',
        'int_limpieza',
        'int_edo',
        'int_torni',

        'int_senalizacion',
        'int_senalizacion_edo',
        'int_senalizacion_faltante',

        'circuitos',
        'circuitos_edo',
        'circuitos_faltante',

        'disponible',
        'disponible_edo',
        'disponible_faltante',
        'bt_observaciones',
        'acc_subterraneo_edo',
        'codos',
        'codos_edo',
        'terminales',
        'terminales_edo',
        'fusibles',
        'fusibles_capacidad',
        'fusibles_edo',
        'fusibles_faltante',
        'mecanismo',
        'mecanismo_edo',
        'mecanismo_danado',
        'se_cable_acomodo',
        'mabete',
        'mabete_edo',
        'mabete_faltante',
        'se_observaciones',
        'bt_cableado_cable_acomodo',
        'bt_cableado_conexiones_edo',
        'bt_cableado_conexiones_faltante',
        'bt_cableado_conexiones_observaciones',
        'trans_vab',
        'trans_vbc',
        'trans_vab2',
        'trans_van',
        'trans_vbc',
        'trans_vnc',
        'int_princ_vab',
        'int_princ_vbc',
        'int_princ_vab2',
        'int_princ_van',
        'int_princ_vbn',
        'int_princ_vcn',
        'int_princ_corriente_la',
        'int_princ_corriente_lb',
        'int_princ_corriente_lc',
        'int_princ_corriente_ln',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'status_id',
        'adpt_tierra_faltante',
        'barras_tierra_faltante'
    ];
}
