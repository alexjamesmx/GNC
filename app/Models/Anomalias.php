<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anomalias extends Model
{
    use HasFactory;

    protected $table = 'anomalias';
    protected $fillable = ['urgencia', 'marca', 'modelo', 'medidas', 'descripcion', 'imagen', 'inspeccion_id', 'tipo_inspeccion_id'];
    public $timestamps = false;

    public function inspeccion()
    {
        return $this->belongsTo(Inspecciones::class, 'inspeccion_id');
    }
    public function tipo_inspeccion()
    {
        return $this->belongsTo(Tipo_inspeccion::class, 'tipo_inspeccion_id');
    }
}
