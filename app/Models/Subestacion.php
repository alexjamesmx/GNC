<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subestacion extends Model
{
    use HasFactory;

    protected $table = 'subestaciones';
    protected $primaryKey = "id";
    public $timestamps = false;
    
    protected $fillable = [
        'subestacion',
        'type_id',
        'enterprise_id',
        'parque_id',
        'status_id',
    ];

    public function parque(){
        return $this->hasOne(Parque::class, 'id', 'parque_id');
    }

    public function status(){
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }
    public function type(){
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
