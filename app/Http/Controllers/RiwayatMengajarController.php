<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RiwayatMengajarModel;
use App\UsersModel;
use Illuminate\Support\Facades\DB;
class RiwayatMengajarController extends Controller
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
        $data                   =            RiwayatMengajarModel::all();
        return view('bagian_page.RiwayatMengajar.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users          =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.RiwayatMengajar.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat_mengajar                       =             new RiwayatMengajarModel();
        $riwayat_mengajar->semester             =             $request->semester;
        $riwayat_mengajar->kode_mata_kuliah     =             $request->kode_mata_kuliah;
        $riwayat_mengajar->nama_mata_kuliah     =             $request->nama_mata_kuliah;
        $riwayat_mengajar->kode_kelas           =             $request->kode_kelas;
        $riwayat_mengajar->perguruan_tinggi     =             $request->perguruan_tinggi;
        $riwayat_mengajar->id_dosen             =             $request->riwayat_dosen;
        $riwayat_mengajar->save();
        return redirect('riwayat_mengajar')->with('pesan','Riwayat Mengajar Disimpan');
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
        $edit           =           RiwayatMengajarModel::find($id);
        $users          =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.RiwayatMengajar.edit',compact('edit','users'));
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
        $riwayat_mengajar                       =             RiwayatMengajarModel::find($id);
        $riwayat_mengajar->semester             =             $request->semester;
        $riwayat_mengajar->kode_mata_kuliah     =             $request->kode_mata_kuliah;
        $riwayat_mengajar->nama_mata_kuliah     =             $request->nama_mata_kuliah;
        $riwayat_mengajar->kode_kelas           =             $request->kode_kelas;
        $riwayat_mengajar->perguruan_tinggi     =             $request->perguruan_tinggi;
        $riwayat_mengajar->id_dosen             =             $request->riwayat_dosen;
        $riwayat_mengajar->save();
        return redirect('riwayat_mengajar')->with('pesan','Riwayat Mengajar diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       RiwayatMengajarModel::find($id);
        $delete->delete();
        return $delete;
    }
}
