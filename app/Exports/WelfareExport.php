<?php

namespace App\Exports;

use App\Models\KhairatMembers;
use App\Models\WelfareService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WelfareExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $columns;
    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    public function view(): View {
        return view('export.welfare', [
            'khairat' => WelfareService::all(),
            'columns' => $this->columns
        ]);
    }
}
