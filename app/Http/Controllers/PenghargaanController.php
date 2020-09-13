<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PenghargaanModel;
class PenghargaanController extends Controller
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
        $data           =           PenghargaanModel::all();
        return view('arif.penghargaan.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.penghargaan.add',compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penghargaan                        =       new PenghargaanModel();
        $penghargaan->nama_penghargaan      =       $request->nama_penghargaan;
        $penghargaan->kategori              =       $request->kategori;
        $penghargaan->lembaga               =       $request->lembaga;
        $penghargaan->tahun                 =       $request->tahun;
        $penghargaan->id_dosen              =       $request->id_dosen;
        $penghargaan->save();
        return redirect('penghargaan')->with('pesan','Data Berhasil di simpan');
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
        $edit                   =           PenghargaanModel::find($id);
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.penghargaan.edit',compact('edit','data_dosen'));
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
        $penghargaan                        =       PenghargaanModel::find($id);
        $penghargaan->nama_penghargaan      =       $request->nama_penghargaan;
        $penghargaan->kategori              =       $request->kategori;
        $penghargaan->lembaga               =       $request->lembaga;
        $penghargaan->tahun                 =       $request->tahun;
        $penghargaan->id_dosen              =       $request->id_dosen;
        $penghargaan->update();
        return redirect('penghargaan')->with('pesan','Data Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       PenghargaanModel::find($id);
        $delete->delete();
        return $delete;
    }
}
