<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PenilaianModel;
class PenilaianController extends Controller
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
        $data                   =           PenilaianModel::all();
        return view('bagian_page.DataPenilaian.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_dosen             =           DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.DataPenilaian.add',compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save                       =             new PenilaianModel();
        $save->element_penilaian    =             $request->element_penilaian;
        $save->id_dosen             =             $request->id_dosen;
        $save->save();
        return redirect('data_penilaian')->with('pesan','Data tersimpan');
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
        //
    }

    public function kuisioner()
    {
        $data_dosen         =       DB::table('users')->where('level','dosen')->get();
        return view('bagian_page.Kuisioner.pilih_dosen',compact('data_dosen'));
    }

    public function KuisionerMahasiswa() {
        $mahasiswa         =        DB::table('users')->where('level','mahasiswa')->get();
        return view('arif.Kuisioner.mahasiswa',compact('mahasiswa'));
    }

    public function KuisionerDosen() {
        $dosen             =        DB::table('users')->where('level', 'dosen')->get();
        return view('arif.Kuisioner.dosen',compact('dosen'));
    }
}
