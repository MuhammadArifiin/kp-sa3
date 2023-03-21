<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class qDoneExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('antrians')
            ->leftJoin('mahasiswas', 'mahasiswas.id', '=', 'antrians.mahasiswa_id')
            ->leftJoin('keterangans', 'keterangans.id', '=', 'antrians.keterangan_id')
            ->select('kode', 'nim', 'nama', 'email', 'hp', 'status')
            ->get();
    }

    public function headings(): array
    {
        return ['Kode Antrian', 'NIM', 'NAMA', 'EMAIL', 'HP', 'STATUS PENGAMBILAN', 'PENGAMBIL'];
        
    }
}
