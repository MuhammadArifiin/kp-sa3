<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserExport implements FromCollection, WithHeadingRow
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select("name", "nim")->get();
    }

    public function headingRow(): array
    {
        return ["name", "nim"];
    }
}
