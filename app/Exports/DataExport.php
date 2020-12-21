<?php

namespace App\Exports;

use App\ImportExcel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ImportExcel::all();
    }

    public function headings(): array
    {
        return[
            "ID_Customer", 
            "Nama", 
            "Alamat", 
            "Kodepos", 
            "Created", 
            "Updated"
        ];
    }
}
