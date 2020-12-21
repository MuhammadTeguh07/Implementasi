<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportExcel extends Model
{
    protected $table = "import_excel";
    protected $fillable = [
        'id_customer', 'nama', 'alamat', 'kodepos',
    ];
}
