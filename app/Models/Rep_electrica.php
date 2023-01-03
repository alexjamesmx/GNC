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

        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'status_id'
    ];
}
