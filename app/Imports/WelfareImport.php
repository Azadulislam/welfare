<?php

namespace App\Imports;

use App\Models\WelfareService;
use Illuminate\Http\Client\Request;
use Maatwebsite\Excel\Concerns\ToModel;

class WelfareImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WelfareService([
            'member_id' => $row['0'],
            'help_cat_id' => $row['1'],
            'informer_name' => $row['2'],
        ]);
    }
}
