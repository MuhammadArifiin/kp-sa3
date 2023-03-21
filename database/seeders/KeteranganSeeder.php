<?php

namespace Database\Seeders;

use App\Models\keterangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        keterangan::create([
            'status' => 'Sudah diambil'
        ]);
        Keterangan::create([
            'status' => 'Diambilkan'
        ]);
    }
}
