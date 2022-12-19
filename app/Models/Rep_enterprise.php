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
        'extintores_no',
        'extintores_tipo_agente',
        'extintores_fecha_vencimiento',
        'extintores_presion',
        'extintores_aro_seguridad',
        'extintores_ubicacion',
        'lamparas_no',
        'lamparas_estado',
        'lamparas_faltante',
        'lamparas_emergencia_no',
        'lamparas_emergencia_estado',
        'lamparas_emergencia_faltante',
        'senalizacion_observaciones',
        'pintura_estado',
        'pintura_requiere',
        'herreria_estado',
        'pintura_requiere',
        'herreria_estado',
        'herreria_requiere',
        'herreria_observaciones',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'status_id'
    ];
}
