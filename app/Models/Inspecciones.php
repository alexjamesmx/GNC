<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspecciones extends Model
{
    use HasFactory;

    protected $table = 'inspecciones';
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'tecnico_responsable',
        'asignado_por',
        'fecha_inicio',
        'fecha_fin',
        'parque_id',
        'enterprise_id',
        'subestacion_id',
        'status_id',
    ];

    public function tecnico()
    {
        return $this->hasOne(User::class, 'id', 'tecnico_responsable');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'asignado_por');
    }

    public function parque()
    {
        return $this->hasOne(Parque::class, 'id', 'parque_id');
    }

    public function enterprise()
    {
        return $this->hasOne(Enterprise::class, 'id', 'enterprise_id');
    }

    public function subestacion()
    {
        return $this->hasOne(Subestacion::class, 'id', 'subestacion_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
