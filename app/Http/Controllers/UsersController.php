<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\RuangKelasModel;
use Excel;
use File;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // this authentification middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_penguna        =      UsersModel::orderBy('id','desc')->get();
        return view('bagian_page.users.daftar_users',compact('data_penguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruang_kelas                =            RuangKelasModel::orderBy('id','desc')->get();
        return view('bagian_page.users.add_users',compact('ruang_kelas'));
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
        if (DB::table('users')->where('email',$request->email)->exists()) {
            return redirect('penguna')->with('pusing','Email Duplikat tidak bisa');
        } else {
            if(Auth::user()->level == 'admin') {
                $foto_profil        =       $request->file('foto_profil');
                if($foto_profil == true) {
                    $users                =       new UsersModel();
                    $users->name          =       $request->nama;
                    $users->email         =       $request->email;
                    $password             =       Hash::make($request->password);
                    $users->password      =       $password;
                    $nama_foto            =       time().$foto_profil->getClientOriginalName();
                    $path_foto            =       'public/profil_imgs/'.$nama_foto;
                    $users->user_img      =       $path_foto;
                    $foto_profil->move(public_path().'/profil_imgs/',$nama_foto);
                    $users->level         =       $request->level;
                    $users->nomor_induk   =       $request->nomor_induk;
                    $users->nomor_telepon =       $request->nomor_telpon;
                    $users->alamat        =       $request->alamat;
                    $users->ruang_kelas   =       $request->ruang_kelas;
                    $users->status        =       $request->status;
                    $users->jurusan       =       $request->jurusan;
                    $users->gelar         =       $request->gelar;
                    $users->pendidikan    =       $request->pendidikan;
                    $users->save();
                    if ($request->level == 'dosen') {
                        return redirect('data_dosen')->with('pesan',$request->nama . ' User sudah di tambahkan');
                    } else {
                        return redirect('penguna')->with('pesan',$request->nama . ' User sudah di tambahkan');
                    }
                } else {
                    $users                =       new UsersModel();
                    $users->name          =       $request->nama;
                    $users->email         =       $request->email;
                    $password             =       Hash::make($request->password);
                    $users->password      =       $password;     
                    $users->user_img      =       'public/profil_imgs/default.png';
                    $users->level         =       $request->level;
                    $users->nomor_induk   =       $request->nomor_induk;
                    $users->nomor_telepon =       $request->nomor_telpon;
                    $users->ruang_kelas   =       $request->ruang_kelas;
                    $users->status        =       $request->status;
                    $users->alamat        =       $request->alamat;
                    $users->gelar         =       $request->gelar;
                    $users->pendidikan    =       $request->pendidikan;
                    $users->save();
                    if ($request->level == 'dosen') {
                        return redirect('data_dosen')->with('pesan',$request->nama . ' User sudah di tambahkan');
                    } else {
                        return redirect('penguna')->with('pesan',$request->nama . ' User sudah di tambahkan');
                    }
                }
            } else {
                return redirect('penguna')->with('pesan','anda bukan admin');
            } 
        }

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
        $edit_user                  =       UsersModel::find($id);
        $ruang_kelas                =            ruangKelasModel::orderBy('id','desc')->get();
        return view('bagian_page.users.edit_users',compact('edit_user','ruang_kelas'));
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
        $update                =        UsersModel::find($id);
        $update->name          =        $request->nama;
        $update->email         =        $request->email;
        if(!empty($request->password)) {
            $password          =        Hash::make($request->password);
            $update->password  =        $password;
        }
        if(!empty($request->hasfile('foto_profil'))) {
            $foto_update       =        $request->file('foto_profil');
            $nama_foto         =        time().$foto_update->getClientOriginalName();
            if($update->user_img == 'public/profil_imgs/default.png') {
                // don't remove
            } else {
                File::delete($update->user_img);
            }
            $path_foto         =       'public/profil_imgs/'.$nama_foto;
            $foto_update->move(public_path().'/profil_imgs/',$nama_foto);
            $update->user_img  =        $path_foto;
        }
        $update->level         =        $request->level;
        $update->nomor_induk   =        $request->nomor_induk;
        $update->nomor_telepon =        $request->nomor_telpon;
        $update->alamat        =        $request->alamat;
        $update->status        =        $request->status;
        $update->ruang_kelas   =        $request->ruang_kelas;
        $update->gelar         =        $request->gelar;
        $update->pendidikan    =        $request->pendidikan;
        $update->update();
        if ($request->level == 'dosen') {
            return redirect('data_dosen')->with('pesan',$request->nama . ' User sudah Diperbaharui');
        } else {
            return redirect('penguna')->with('pesan',$request->nama . ' User sudah Diperbaharui');
        }
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
        $delete     =   UsersModel::find($id);
        if($delete->user_img == 'public/profil_imgs/default.png') {
            // don't remove
        } else {
            File::delete($delete->user_img);
        }
        $delete->delete();
        return $delete;
    }

    public function UploadExcel(Request $request)
    {
        $file_excel             =           $request->file('file_data');
        if (!empty($file_excel)) {
            $load_excel         =           \Excel::load($file_excel, function($reader) {
            })->get();
            
            foreach ($load_excel as $key => $data) {
                $array_data[]   =            ['name' => $data->nama,'email' => $data->email,'password' => Hash::make($data->password),'user_img' => 'public/profil_imgs/default.png','level' => $data->level,'nomor_induk' => $data->nomor_induk,'nomor_telepon' => $data->nomor_telepon,'alamat' => $data->alamat,'status' => $data->status,'ruang_kelas' => $data->ruang_kelas];  
            }
            if (!empty($array_data)) {
                \DB::table('users')->insert($array_data);
            }
            return $array_data;
        } else {
            return 'tidak_ada';
        }
        // return $file_excel;
    }
}
