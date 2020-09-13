<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPrestasiModel;
use File;
class DataPrestasiController extends Controller
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
        $data_prestasi           =             DataPrestasiModel::orderBy('id','desc')->get();
        return view('bagian_page.PrestasiSekolah.daftar',compact('data_prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bagian_page.PrestasiSekolah.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan                 =           new DataPrestasiModel();
        $simpan->judul          =           $request->judul;
        if ($request->hasfile('gambar_prestasi')) {
            $file_gambar                =           $request->file('gambar_prestasi');
            $nama_file                  =           time().$file_gambar->getClientOriginalName();
            $path_simpan                =           'public/gambar_prestasi/'.$nama_file;
            $file_gambar->move(public_path().'/gambar_prestasi/',$nama_file);
            $simpan->gambar_sejarah     =           $path_simpan;
        }
        $simpan->konten                 =           $request->konten;
        $simpan->save();
        return redirect('data_prestasi')->with('pesan','Data Prestasi Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit                       =               DataPrestasiModel::find($id);
        return view('bagian_page.PrestasiSekolah.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update                     =               DataPrestasiModel::find($id);
        $update->judul              =               $request->judul;
        if ($request->hasfile('gambar_prestasi')) {
            $file_update            =               $request->file('gambar_prestasi');
            $nama_update            =               time().$file_update->getClientOriginalName();
            $path_update            =               'public/gambar_prestasi/'.$nama_update;
            $path_delete            =               $update->gambar_sejarah;
            File::delete($path_delete);
            $file_update->move(public_path().'/gambar_prestasi/',$nama_update);
            $update->gambar_sejarah =                $path_update;
        }
        $update->konten             =                $request->konten;
        $update->update();
        return redirect('data_prestasi')->with('pesan','Data Prestasi sudah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                     =                DataPrestasiModel::find($id);
        $path_hapus                 =                $delete->gambar_sejarah;
        File::delete($path_hapus);
        $delete->delete();
        return $delete;
    }
}
