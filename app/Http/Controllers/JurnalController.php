<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JurnalModel;
class JurnalController extends Controller
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
        $data           =           JurnalModel::all();
        return view('arif.jurnal.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.jurnal.add',compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurnal                 =       new JurnalModel();
        $jurnal->penulis        =       $request->penulis;
        $jurnal->penulis_kedua  =       $request->penulis_kedua;
        $jurnal->judul_artikel  =       $request->judul_artikel;
        $jurnal->nama_jurnal    =       $request->nama_jurnal;
        $jurnal->tahun          =       $request->waktu;
        $jurnal->volume         =       $request->volume;
        $jurnal->id_dosen       =       $request->id_dosen;
        $jurnal->save();
        return redirect('jurnal')->with('pesan','Data Jurnal disimpan');
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
        //
        $edit                   =           JurnalModel::find($id);
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('arif.jurnal.edit',compact('edit','data_dosen'));
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
        $jurnal                 =       JurnalModel::find($id);
        $jurnal->penulis        =       $request->penulis;
        $jurnal->penulis_kedua  =       $request->penulis_kedua;
        $jurnal->judul_artikel  =       $request->judul_artikel;
        $jurnal->nama_jurnal    =       $request->nama_jurnal;
        $jurnal->tahun          =       $request->waktu;
        $jurnal->volume         =       $request->volume;
        $jurnal->id_dosen       =       $request->id_dosen;
        $jurnal->update();
        return redirect('jurnal')->with('pesan','Data Jurnal Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       JurnalModel::find($id);
        $delete->delete();
        return $delete;
    }
}
