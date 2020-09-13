<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarNilaiKuisionerModel;
use Illuminate\Support\Facades\DB;
class DaftarNilaiKuisionerController extends Controller
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
        $data                   =           DaftarNilaiKuisionerModel::all();
        $group_data             =           DaftarNilaiKuisionerModel::groupBy('id_dosen')->having(DB::raw('count(*)'), ">","1")->select('id_dosen')->get();
        foreach ($group_data as $item) {
            
        }
        return view('arif.daftar_nilai_kuisioner.daftar',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan_kuisioner              =       new DaftarNilaiKuisionerModel();
        $find_user                     =       DB::table('users')->where('id', $request->id_dosen)->first();
        $simpan_kuisioner->nama        =       $find_user->name;
        $simpan_kuisioner->kuisioner   =       $request->kuisioner;
        if ($find_user->level == 'mahasiswa') {
            $simpan_kuisioner->mata_kuliah =       $request->mata_kuliah;
            $simpan_kuisioner->semester    =       $request->semester;
        }  else {
            $simpan_kuisioner->mata_kuliah =       "-";
            $simpan_kuisioner->semester    =       "-";
        }
        $simpan_kuisioner->nilai       =       $request->nilai;
        $simpan_kuisioner->id_dosen    =       $find_user->id;
        $simpan_kuisioner->save();
        return redirect('daftar_nilai_kuisioner')->with('pesan','Penilaian '.$find_user->name. ' Disimpan');
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
}
