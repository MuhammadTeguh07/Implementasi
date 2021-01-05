<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_barang extends Controller
{
    public function index()
    {
        $barang =  DB::table('barang')->orderby('ID_BARANG', 'asc')->get();

        //return response()->json([
        //    "message" => "Data barang berhasil di tampilkan",
        //    "barang" => $barang
        //], 200);
        //return DB::table('barang')->orderby('ID_BARANG', 'asc')->get();
        return view('/barang/index', ['barang' => $barang]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        DB::table('barang')->insert([
            'NAMA_BARANG' =>$request->nama  
        ]);

        //return response()->json([
        //    "message" => "Data barang berhasil di tambahkan"
        //], 201);
        return redirect('/barang');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $barang = DB::table('barang')->where('ID_BARANG',$id)->get();
        $pdf = \PDF::loadview('/barang/print',['barang' => $barang])->setPaper('f4', 'landscape');
        return $pdf->stream('Barcode-Barang.pdf');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function scan()
    {
        $barang = DB::table('barang')->get();
        return view('/barang/scann',['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alert($id){
        $barang = DB::table('barang')->where('ID_BARANG',$id)->get();
        return json_encode($barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        DB::table("barang")->where("ID_BARANG", $request->id)->update([
            'NAMA_BARANG' => $request->nama
        ]);

        //return response()->json([
        //    "message" => "Data barang berhasil di edit"
        //], 200);
        return redirect('/barang');
    }

}
