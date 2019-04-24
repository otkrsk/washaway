<?php

namespace App\Imports;

use App\Service;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Service([
            'type' => $row[0],
            'category' => $row[1],
            'name' => $row[2],
            'sedan' => $row[3],
            'mpv' => $row[4],
            'msedan' => $row[5],
            'mmpv' => $row[6]
        ]);
    }
}
