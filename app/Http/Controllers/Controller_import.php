<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImportExcel;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\HeadingRowImport;

class Controller_import extends Controller
{
    public function index()
    {
        $import = ImportExcel::all();
        //dd($import);
        return view('/excel/index', compact('import'));
    }

    public function dataExport()
    {
        return Excel::download(new DataExport, 'Data.xls');
    }

    public function dataImport(Request $request)
    {
        $message = [
            'mimes' => 'File Excel Harus Format .xls',
        ];

        $this->validate($request, [
            'file' => 'required|mimes:xls'
        ],$message);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataExcel/', $namaFile);

        $headings = (new HeadingRowImport)->toArray(public_path('/DataExcel/'.$namaFile));
        $headings = $headings[0][0];
        if($headings[0] == "id_customer" && $headings[1] == "nama" && $headings[2] == "alamat" && $headings[3] == "kodepos"){
            Excel::import(new DataImport, public_path('/DataExcel/'.$namaFile));

            Session::flash('fsuccess','Data Excel Berhasil di Import');
            return redirect('/excel');
        }
        else{
            Session::flash('ferror','Data Excel Tidak Cocok');
            return redirect('/excel');
        }

        
    }
}
