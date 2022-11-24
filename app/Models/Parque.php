<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parque extends Model
{
    use HasFactory;

    protected $table = 'parques';
    public $timestamps = false;

    protected $fillable = [
        'parque',
        'calle',
        'municipio',
        'codigo',
        'status',
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'foreign_key', 'status_id');
    }
}
