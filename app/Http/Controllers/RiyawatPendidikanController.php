<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use Illuminate\Support\Facades\DB;
use App\RiwayatPendidikanModel;
class RiyawatPendidikanController extends Controller
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
        //
        $data                   =               RiwayatPendidikanModel::all();
        return view('bagian_page.RiwayatPendidikan.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users              =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.RiwayatPendidikan.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat_pendidikan                             =       new RiwayatPendidikanModel();
        $riwayat_pendidikan->perguruan_tinggi           =       $request->perguruan_tinggi;
        $riwayat_pendidikan->gelar_akademik             =       $request->gelar_akademik;
        $riwayat_pendidikan->tanggal_izasah             =       $request->tanggal_izasah;
        $riwayat_pendidikan->jenjang                    =       $request->jenjang;
        $riwayat_pendidikan->id_dosen                   =       $request->riwayat_dosen;
        $riwayat_pendidikan->save();
        return redirect('riwayat_pendidikan')->with('pesan','Riwayat Pendidikan tersimpan');
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
        $edit               =           RiwayatPendidikanModel::find($id);
        $users              =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.RiwayatPendidikan.edit',compact('edit','users'));

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
        //
        $riwayat_pendidikan                             =       RiwayatPendidikanModel::find($id);
        $riwayat_pendidikan->perguruan_tinggi           =       $request->perguruan_tinggi;
        $riwayat_pendidikan->gelar_akademik             =       $request->gelar_akademik;
        $riwayat_pendidikan->tanggal_izasah             =       $request->tanggal_izasah;
        $riwayat_pendidikan->jenjang                    =       $request->jenjang;
        $riwayat_pendidikan->id_dosen                   =       $request->riwayat_dosen;
        $riwayat_pendidikan->update();
        return redirect('riwayat_pendidikan')->with('pesan','Riwayat Pendidikan dipernaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete                 =       RiwayatPendidikanModel::find($id);
        $delete->delete();
        return $delete;
    }
}
