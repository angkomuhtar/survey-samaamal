<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class UsersImport implements WithHeadingRow,ToCollection
{
    public $data;

    public function collection(Collection $rows)
    {
        return $this->data = $rows;
    }
}