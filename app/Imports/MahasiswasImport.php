<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswasImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'email' => $row[2],
            'hp' => $row[3],
            'alamat' => $row[4],
            'fakultas_id' => $row[5],
            'jurusan_id' => $row[6],
            'jas_id' => $row[7]
        ]);
    }
}
