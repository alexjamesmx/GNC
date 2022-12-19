<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_inspeccion extends Model
{
    use HasFactory;
    protected $table = 'tipo_inspeccion';
    protected $fillable = ['tipo'];
    public $timestamps = false;
}
