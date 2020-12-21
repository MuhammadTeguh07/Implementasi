<?php

namespace App\Imports;

use App\ImportExcel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DataImport implements ToModel, WithHeadingRow, WithValidation
{
    public function rules(): array
    {
        return [
            'id_customer' => 'required|unique:import_excel',
            'nama' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required'
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportExcel([
            'id_customer' => $row['id_customer'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'kodepos' => $row['kodepos'],
        ]);
    }
}
