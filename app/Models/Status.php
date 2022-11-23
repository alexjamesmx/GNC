<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'status_id', 'id');
    }
    public function parque()
    {
        return $this->belongsTo(Parque::class, 'status_id', 'id');
    }
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'status_id', 'id');
    }
}
