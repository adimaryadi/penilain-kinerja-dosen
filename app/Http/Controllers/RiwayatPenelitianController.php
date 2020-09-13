<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use App\RiwayatPenelitianModel;
use Illuminate\Support\Facades\DB;
class RiwayatPenelitianController extends Controller
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
        $data                   =           RiwayatPenelitianModel::all();
        return view('bagian_page.RiwayatPenelitian.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users          =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.RiwayatPenelitian.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penelitian                      =       new RiwayatPenelitianModel();
        $penelitian->judul_penelitian    =       $request->judul_penelitian;
        $penelitian->bidang_ilmu         =       $request->bidang_ilmu;
        $penelitian->lembaga             =       $request->lembaga;
        $penelitian->tahun               =       $request->tahun;
        $penelitian->id_dosen            =       $request->riwayat_dosen;
        $penelitian->save();
        return redirect('riwayat_penelitian')->with('pesan','Riwayat Penelitian Disimpan');
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
        $users          =           DB::table('users')->where('level','dosen')->get();
        $edit           =           RiwayatPenelitianModel::find($id);
        return view('bagian_page.RiwayatPenelitian.edit',compact('users','edit'));
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
        $penelitian                      =       RiwayatPenelitianModel::find($id);
        $penelitian->judul_penelitian    =       $request->judul_penelitian;
        $penelitian->bidang_ilmu         =       $request->bidang_ilmu;
        $penelitian->lembaga             =       $request->lembaga;
        $penelitian->tahun               =       $request->tahun;
        $penelitian->id_dosen            =       $request->riwayat_dosen;
        $penelitian->update();
        return redirect('riwayat_penelitian')->with('pesan','Riwayat Penelitian di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       RiwayatPenelitianModel::find($id);
        $delete->delete();
        return $delete;
    }
}
