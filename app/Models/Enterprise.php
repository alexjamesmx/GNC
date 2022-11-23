<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $table = "enterprises";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'user_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'foreign_key', 'status_id');
    }
}
