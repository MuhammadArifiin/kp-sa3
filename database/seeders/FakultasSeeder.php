<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakultas = [
            [
                'kodeFakultas' => 'FKIP',
                'fakultas' => 'Fakultas Keguruan dan Ilmu Pendidikan'
            ],
            [
                'kodeFakultas' => 'FT',
                'fakultas' => 'Fakultas Teknik'
            ],
            [
                'kodeFakultas' => 'FH',
                'fakultas' => 'Fakultas Hukum'
            ],
            [
                'kodeFakultas' => 'FK',
                'fakultas' => 'Fakultas Kedokteran'
            ],
            [
                'kodeFakultas' => 'FISIP',
                'fakultas' => 'Fakultas Ilmu Sosial dan Ilmu Politik'
            ],
            [
                'kodeFakultas' => 'FEB',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis'
            ],
            [
                'kodeFakultas' => 'FAPERTA',
                'fakultas' => 'Fakultas Pertanian'
            ],
            [
                'kodeFakultas' => 'FMIPA',
                'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alaman'
            ],
            [
                'kodeFakultas' => 'PASCA',
                'fakultas' => 'Program Pascasarjana'
            ]
        ];

        foreach ($fakultas as $key => $fakultas) {
            Fakultas::create($fakultas);
        }
    }
}
