<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;
    protected $table = 'perjalanans';
    protected $fillable = ['id_user', 'tanggal', 'lokasi', 'jam', 'suhu'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
