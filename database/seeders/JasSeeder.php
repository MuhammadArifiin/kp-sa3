<?php

namespace Database\Seeders;

use App\Models\Jas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jas = [
            [
                'size' => 'S',
                'stok' => '400'
            ],
            [
                'size' => 'M',
                'stok' => '400'
            ],
            [
                'size' => 'L',
                'stok' => '400'
            ],
            [
                'size' => 'XL',
                'stok' => '400'
            ],
            [
                'size' => 'XXL',
                'stok' => '400'
            ],
        ];

        foreach ($jas as $key => $jas) {
            Jas::create($jas);
        }
    }
}
