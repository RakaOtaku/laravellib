<?php

namespace App\Exports;

use App\Models\library;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return library::all();
    }
}
