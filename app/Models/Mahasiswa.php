<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'hp',
        'alamat',
        'fakultas_id',
        'jurusan_id',
        'jas_id',
    ];
}
