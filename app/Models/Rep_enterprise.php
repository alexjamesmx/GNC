<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rep_enterprise extends Model
{
    use HasFactory;


    protected $table = 'rep_enterprises';
    public $timestamps = false;
    protected $fillable = [
        'inspeccion_id',
        'marca',
        'capacidad',
        'neutro',
        'tension',
        'impedancia',
        'a',
        'c',
        'lts_aceite',
        'conex_primario',
        'conex_secundario',
        'fecha_fabricacion',
        'aceite',
        'peso_total',
        'limpieza',
        'indicador_nivel',
        'indicador_temperatura',
        'indicador_temperatura_max',
        'valvula_alivio',
        'valvula_llenado',
        'valvula_drenado',
        'valvula_muestreo',
        'cambiador_derivaciones',
        'pintura_estado',
        'tierra_neutro',
        'tierra_tanque',
        'tierra_codos',
        'tierra_insertos',
        'boquillas_h1',
        'boquillas_h2',
        'boquillas_h3',
        'boquillas_x0',
        'boquillas_x1',
        'boquillas_x2',
        'boquillas_x3',
        'observaciones',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'status_id'
    ];
}
