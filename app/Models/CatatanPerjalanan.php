<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPerjalanan extends Model
{
    use HasFactory;

    protected $table = 'catatan_perjalanan';
    protected $fillable = ['nik', 'tanggal', 'jam', 'lokasi', 'suhu'];
}
