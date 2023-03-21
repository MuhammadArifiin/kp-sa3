<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jurusan extends Model
{
    public function jurusan()
    {
        return DB::table('jurusan')
            ->leftJoin('fakultas', 'fakultas.id', '=', 'jurusan.fakultas_id')
            ->get();
    }
}
