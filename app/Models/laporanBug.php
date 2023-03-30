<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanBug extends Model
{
    use HasFactory;
    protected $table = 'laporanBug';

    protected $fillable = ['pelapor','jenis','deskripsi','tgl_kejadian','status'];
}
