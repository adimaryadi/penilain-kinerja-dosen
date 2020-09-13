<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use Illuminate\Support\Facades\DB;
use File;

class DataDosenController extends Controller
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
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.DataDosen.daftar',compact('data_dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function biodata(Request $request) {
        $id                    =           $request->nip;
        $riwayat_pendidikan    =           DB::table('riwayat_pendidikan')->where('id_dosen',$id)->get();
        $riwayat_penelitian    =           DB::table('riwayat_penelitian')->where('id_dosen',$id)->get();
        $riwayat_mengajar      =           DB::table('riwayat_mengajar')->where('id_dosen',$id)->get();
        $karya_tulis           =           DB::table('karya_tulis')->where('id_dosen',$id)->get();
        $pelatihan             =           DB::table('pelatihan')->where('id_dosen',$id)->get();
        $penghargaan           =           DB::table('penghargaan')->where('id_dosen',$id)->get();
        $jurnal                =           DB::table('jurnal')->where('id_dosen',$id)->get();
        $users                 =           UsersModel::find($id);
        // return $riwayat_mengajar;
        return view('bagian_page.DataDosen.biodata',compact('jurnal','penghargaan','pelatihan','karya_tulis','riwayat_mengajar','riwayat_pendidikan','riwayat_penelitian','users'));
    }

    public function create()
    {
        return view('bagian_page.DataDosen.add');
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
        $edit_user                  =           UsersModel::find($id);
        return view('bagian_page.DataDosen.edit',compact('edit_user'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete     =   UsersModel::find($id);
        if($delete->user_img == 'public/profil_imgs/default.png') {
            // don't remove
        } else {
            File::delete($delete->user_img);
        }
        $delete->delete();
        return $delete;
    }
}
