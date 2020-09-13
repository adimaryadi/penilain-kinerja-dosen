<?php

namespace App\Http\Controllers;

use App\KaryaTulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KaryaTulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data           =       KaryaTulis::all();
        return view('arif.karya_tulis.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.karya_tulis.add',compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $karya_tulis                       =       new  KaryaTulis();
        $karya_tulis->penulis              =       $request->penulisan;
        $karya_tulis->penulis_kedua        =       $request->penulis_kedua;
        $karya_tulis->judul_buku           =       $request->judul_buku;
        $karya_tulis->nama_penerbit        =       $request->nama_penerbit;
        $karya_tulis->tahun                =       $request->tahun;
        $karya_tulis->kota_negara          =       $request->kota_negara;
        $karya_tulis->id_dosen             =       $request->id_dosen;
        $karya_tulis->save();
        return redirect('karya_tulis')->with('pesan','Karya Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KaryaTulis  $karyaTulis
     * @return \Illuminate\Http\Response
     */
    public function show(KaryaTulis $karyaTulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KaryaTulis  $karyaTulis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit                   =           KaryaTulis::find($id);
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.karya_tulis.edit',compact('edit','data_dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KaryaTulis  $karyaTulis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karya_tulis                       =       KaryaTulis::find($id);
        $karya_tulis->penulis              =       $request->penulisan;
        $karya_tulis->penulis_kedua        =       $request->penulis_kedua;
        $karya_tulis->judul_buku           =       $request->judul_buku;
        $karya_tulis->nama_penerbit        =       $request->nama_penerbit;
        $karya_tulis->tahun                =       $request->tahun;
        $karya_tulis->kota_negara          =       $request->kota_negara;
        $karya_tulis->id_dosen             =       $request->id_dosen;
        $karya_tulis->update();
        return redirect('karya_tulis')->with('pesan','Karya diperbaharui');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KaryaTulis  $karyaTulis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       KaryaTulis::find($id);
        $delete->delete();
        return $delete;
    }
}
