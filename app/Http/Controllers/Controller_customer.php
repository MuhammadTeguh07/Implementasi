<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Controller_customer extends Controller
{
    public function index() 
    {
        $customer = DB::table('customer')->orderby('ID_CUSTOMER', 'asc')->get();
        $kelurahan = DB::table('kelurahan')->get();
        return view('/customer/index', ['customer' => $customer, 'kelurahan' => $kelurahan]);
    }

    public function getProvinsi1(){ 
        $customer = DB::table('customer')->get();
        $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI", "ID_PROVINSI");
        return view('/customer/insert1', compact('provinsi'), ['customer' => $customer]);
    }
  
    public function getKota1($id){
        $kota = DB::table("kota")->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA", "ID_KOTA");
        return json_encode($kota);
    }
  
    public function getKecamatan1($id){
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA", $id)->pluck("NAMA_KECAMATAN", "ID_KECAMATAN");
        return json_encode($kecamatan);
    }
  
    public function getKelurahan1($id){
        $kelurahan = DB::table('kelurahan')->where('ID_KECAMATAN',$id)->get();
        return json_encode($kelurahan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert1(Request $request)
    {
        DB::table('customer')->insert([ 
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FOTO' => base64_encode($request->foto)
        ]);
        //mengalihkan halaman ke halaman customer
        return redirect('/customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getProvinsi2(){ 
        $customer = DB::table('customer')->get();
        $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI", "ID_PROVINSI");
        return view('/customer/insert2', compact('provinsi'), ['customer' => $customer]);
    }
  
    public function getKota2($id){
        $kota = DB::table("kota")->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA", "ID_KOTA");
        return json_encode($kota);
    }
  
    public function getKecamatan2($id){
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA", $id)->pluck("NAMA_KECAMATAN", "ID_KECAMATAN");
        return json_encode($kecamatan);
    }
  
    public function getKelurahan2($id){
        $kelurahan = DB::table('kelurahan')->where('ID_KECAMATAN',$id)->get();
        return json_encode($kelurahan);
    }

    public function insert2(Request $request)
    {
        //decode base64 ke jpeg
        $foto1 = $request->foto;
        $foto2 = str_replace('data:image/jpeg;base64,','',$foto1);
        $foto3 = str_replace(' ', '+', $foto2);
        $foto_png = base64_decode($foto3);

        //nama foto
        $nama_foto1 = time(). $request->nama . '.jpeg';
        $nama_foto2 = str_replace(' ', '_', $nama_foto1);

        //path foto 
        $path = '/foto/'.$nama_foto2;

        //simpan foto ke path
        \File::put(base_path().'/public/foto/'.$nama_foto2, $foto_png);

        DB::table('customer')->insert([
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FILE_PATH' => $path
        ]);
        return redirect('/customer');
    }

}
