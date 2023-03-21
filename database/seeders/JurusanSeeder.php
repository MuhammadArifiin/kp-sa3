<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'kodeJurusan' => '86275',
                'jurusan' => 'Pendidikan Luar Sekolah',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86201',
                'jurusan' => 'Bimbingan dan Konseling',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86231',
                'jurusan' => 'Manajemen Pendidikan',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86203',
                'jurusan' => 'Teknologi Pendidikan',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '87205',
                'jurusan' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '87273',
                'jurusan' => 'Pendidikan Ekonomi',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '84273',
                'jurusan' => 'Pendidikan Fisika',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '84274',
                'jurusan' => 'Pendidikan Kimia',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '84202',
                'jurusan' => 'Pendidikan Matematika',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '84205',
                'jurusan' => 'Pendidikan Biologi',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '88203',
                'jurusan' => 'Pendidikan Bahasa Inggris',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '88201',
                'jurusan' => 'Pendidikan Bahasa dan Sastra Indonesia',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '88209',
                'jurusan' => 'Pendidikan Seni Drama Tari dan Musik ',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '83203',
                'jurusan' => 'Pendidikan Teknik Mesin',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '83205',
                'jurusan' => 'Pendidikan Teknik Bangunan',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86207',
                'jurusan' => 'Pendidikan Guru Pendidikan Anak Usia Dini',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86206',
                'jurusan' => 'Pendidikan Guru Sekolah Dasar',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '85201',
                'jurusan' => 'Pendidikan Jasmani Kesehatan dan Rekreasi',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '86904',
                'jurusan' => 'Pendidikan Profesi Guru',
                'fakultas_id' => '1'
            ],
            [
                'kodeJurusan' => '55201',
                'jurusan' => 'Teknik Informatika',
                'fakultas_id' => '2'
            ],
            [
                'kodeJurusan' => '22201',
                'jurusan' => 'Teknik Sipil',
                'fakultas_id' => '2'
            ],
            [
                'kodeJurusan' => '31201',
                'jurusan' => 'Teknik Pertambangan',
                'fakultas_id' => '2'
            ],
            [
                'kodeJurusan' => '23201',
                'jurusan' => 'Arsitektur',
                'fakultas_id' => '2'
            ],
            [
                'kodeJurusan' => '74201',
                'jurusan' => 'Ilmu Hukum',
                'fakultas_id' => '3'
            ],
            [
                'kodeJurusan' => 'FK',
                'jurusan' => 'Kedokteran',
                'fakultas_id' => '4'
            ],
            [
                'kodeJurusan' => 'FK',
                'jurusan' => 'Profesi Dokter',
                'fakultas_id' => '4'
            ],
            [
                'kodeJurusan' => '65201',
                'jurusan' => 'Ilmu Pemerintahan',
                'fakultas_id' => '5'
            ],
            [
                'kodeJurusan' => '63201',
                'jurusan' => 'Ilmu Administrasi Negara',
                'fakultas_id' => '5'
            ],
            [
                'kodeJurusan' => '69201',
                'jurusan' => 'Sosiologi',
                'fakultas_id' => '5'
            ],
            [
                'kodeJurusan' => '60201',
                'jurusan' => 'Ekonomi Pembangunan',
                'fakultas_id' => '6'
            ],
            [
                'kodeJurusan' => '62201',
                'jurusan' => 'Akuntansi',
                'fakultas_id' => '6'
            ],
            [
                'kodeJurusan' => '61201',
                'jurusan' => 'Manajemen',
                'fakultas_id' => '6'
            ],
            [
                'kodeJurusan' => '54211',
                'jurusan' => 'Agroteknologi',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '54238',
                'jurusan' => 'Peternakan',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '41211',
                'jurusan' => 'Teknologi Industri Pertanian',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '54201',
                'jurusan' => 'Agribisnis',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '54251',
                'jurusan' => 'Kehutanan',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '54242',
                'jurusan' => 'Manajemen Sumberdaya Perairan',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '54243',
                'jurusan' => 'Budidaya Perairan',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '41234',
                'jurusan' => 'Teknologi Hasil Perikanan',
                'fakultas_id' => '7'
            ],
            [
                'kodeJurusan' => '45201',
                'jurusan' => 'Fisika',
                'fakultas_id' => '8'
            ],
            [
                'kodeJurusan' => '47201',
                'jurusan' => 'Kimia',
                'fakultas_id' => '8'
            ],
            [
                'kodeJurusan' => '46201',
                'jurusan' => 'Biologi',
                'fakultas_id' => '8'
            ],
            [
                'kodeJurusan' => '61101',
                'jurusan' => 'Magister Manajemen',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '95101',
                'jurusan' => 'Magister Pengelolaan Sumberdaya Alam dan Lingkungan',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '88103',
                'jurusan' => 'Magister Pendidikan Bahasa Inggris',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '86105',
                'jurusan' => 'Magister Pendidikan Luar Sekolah',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '84104',
                'jurusan' => 'Magister Pendidikan Kimia',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '84105',
                'jurusan' => 'Magister Pendidikan Biologi',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '74101',
                'jurusan' => 'Magister Ilmu Hukum',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '60101',
                'jurusan' => 'Magister Ilmu Ekonomi',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '86122',
                'jurusan' => 'Magister Pendidikan Dasar',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '87103',
                'jurusan' => 'Magister Pendidikan Ekonomi',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '87120',
                'jurusan' => 'Magister Pendidikan IPS',
                'fakultas_id' => '9'
            ],
            [
                'kodeJurusan' => '95029',
                'jurusan' => 'Doktor Ilmu Lingkungan',
                'fakultas_id' => '9'
            ],

        ];

        foreach ($jurusan as $key => $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}
