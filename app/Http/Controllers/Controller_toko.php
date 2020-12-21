<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Controller_toko extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = DB::table('toko')->orderby('ID_TOKO', 'asc')->get();
        return view('/toko/index',[ 'toko' => $toko ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function insert(Request $request)
    {
        $id=(DB::table('toko')->count('ID_TOKO'))+1;
        $barcode_id = "TK".str_pad($id,3,"0",STR_PAD_LEFT);
        DB::table('toko')->insert([
            'ID_TOKO' => $barcode_id,
            'NAMA_TOKO' =>$request->nama,  
            'LATITUDE' =>$request->latitude,
            'LONGITUDE' =>$request->longitude,
            'ACCURACY' =>$request->accuracy
        ]);
        return redirect('/toko');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/toko/insert');
    }

    public function printBarcode(){
        $barang = Barcode::get();
        $no = 1; 
        $paper_width = 793.7007874; // 21 cm
        $paper_height = 623.62204724; // 16.5 cm
        $paper_size = array(0, 0, $paper_width, $paper_height);
		$pdf =  PDF::loadView  ('/barcode/barcode_pdf',  compact('barang', 'no')); 
		$pdf->setPaper("f4"); 
		return $pdf->stream(); 
    }

    public function print($id)
    {
        $toko = DB::table('toko')->where('ID_TOKO',$id)->get();
        $pdf = \PDF::loadview('/toko/print',['toko' => $toko])->setPaper('f4', 'landscape');
        return $pdf->stream('Barcode-Toko.pdf');
    }

    public function scan()
    {
        $toko = DB::table('toko')->get();
        return view('/toko/scann',['toko' => $toko]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function request()
    {
        $id = $_POST['id'];
        $data = DB::table('toko')->select('NAMA_TOKO', 'LATITUDE', 'LONGITUDE', 'ACCURACY')->where('ID_TOKO',$id)->get();
        return response()->json(['data' => $data]);
    }

    public function coba()
    {
        return view('/toko/coba');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
