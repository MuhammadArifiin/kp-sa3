<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UserImport implements ToModel, WithStartRow
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
        if (!isset($row[2])) {
            return null;
        }

        return new User([
            'email'    => $row[2],
            'name'     => $row[1],
            'password' => bcrypt($row[0])
        ]);
    }
}

