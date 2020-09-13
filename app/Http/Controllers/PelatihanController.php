<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PelatihanModel;
use Illuminate\Support\Facades\DB;
class PelatihanController extends Controller
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
        $data           =           PelatihanModel::all();
        return view('arif.penilaian.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dosen             =       DB::table('users')->where('level','dosen')->get();
        return view('arif.penilaian.add',compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelatihan              =           new PelatihanModel();
        $pelatihan->pelatihan   =           $request->pelatihan;
        $pelatihan->lembaga     =           $request->lembaga;
        $pelatihan->lokasi      =           $request->lokasi;
        $pelatihan->level       =           $request->level;
        $pelatihan->waktu       =           $request->waktu;
        $pelatihan->posisi      =           $request->posisi;
        $pelatihan->id_dosen    =           $request->id_dosen;
        $pelatihan->save();
        return redirect('pelatihan')->with('pesan','Pelatihan Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit                   =       PelatihanModel::find($id);
        $data_dosen             =       DB::table('users')->where('level','dosen')->get();
        return view('arif.penilaian.edit',compact('edit','data_dosen'));
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
        $pelatihan              =           PelatihanModel::find($id);
        $pelatihan->pelatihan   =           $request->pelatihan;
        $pelatihan->lembaga     =           $request->lembaga;
        $pelatihan->lokasi      =           $request->lokasi;
        $pelatihan->level       =           $request->level;
        $pelatihan->waktu       =           $request->waktu;
        $pelatihan->posisi      =           $request->posisi;
        $pelatihan->id_dosen    =           $request->id_dosen;
        $pelatihan->update();
        return redirect('pelatihan')->with('pesan','Pelatihan Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       PelatihanModel::find($id);
        $delete->delete();
        return $delete;
    }
}
