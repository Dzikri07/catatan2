<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = 'catatan';
    protected $fillable = ['lokasi', 'tanggal', 'waktu', 'suhu','foto','lama','desc'];
    
}
