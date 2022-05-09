<?php

namespace App\Imports;

use App\Models\Angels;
use Maatwebsite\Excel\Concerns\ToModel;

class AngelsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Angels([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'firm' => $row[2],
            'email' => $row[3],
            'linkedin' => $row[4] ?? null,
            'facebook' => $row[5] ?? null,
            'twitter' => $row[6] ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}
