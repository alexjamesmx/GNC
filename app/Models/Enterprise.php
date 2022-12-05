<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $table = "enterprises";
    public $timestamps = false;


    protected $fillable = [
        'enterprise',
        'razon_social',
        'cp',
        'rfc',
        'address',
        'ciudad',
        'regimen_fiscal',
        'phone',
        'fax',
        'location',
        'user_id',
        'parque_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'user_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'foreign_key', 'status_id');
    }
    public function parque(){
        return $this->belongsTo(Parque::class, 'foreign_key', 'parque_id');
    }
    public function subestaciones(){
        return $this->hasMany(Subestacion::class, 'enterprise_id', 'enterprise_id');
    }
}
