<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PPDBSiswaModel;
use App\PPDBGuruTerbaikModel;
use App\SliderPPDBModel;
use App\InformasiPPDBModel;
use App\ApaItuPPDBModel;
use App\PersyaratanCalonPesertaDidikModel;
class PPDBSiswaController extends Controller
{
    public function PPDB_penerimaan(Request $request)
    {
        try {
            if(DB::table('ppdb_pmb')->where('email', $request->email)->exists()) {
                return response()->json(['email_digunakan']);
            } else {
                $new_ppdb                           =           new PPDBSiswaModel();
                $new_ppdb->nama_siswa               =           $request->nama_siswa;
                $new_ppdb->nama_sekolah_smp         =           $request->nama_sekolah_smp;
                $new_ppdb->jenis_kelamin            =           $request->jenis_kelamin;
                $new_ppdb->tanggal_lahir_siswa      =           $request->tanggal_lahir;
                $new_ppdb->Alamat_siswa             =           $request->alamat_rumah;
                $new_ppdb->RT                       =           $request->rt;
                $new_ppdb->RW                       =           $request->rw;
                $new_ppdb->kecamatan                =           $request->kecamatan;
                $new_ppdb->kota                     =           $request->kota;
                $new_ppdb->provinsi                 =           $request->provinsi;
                $new_ppdb->nama_ayah                =           $request->nama_ayah;
                $new_ppdb->umur_ayah                =           $request->umur_ayah;
                $new_ppdb->tanggal_lahir_ayah       =           $request->tanggal_lahir_ayah;
                $new_ppdb->nomor_telepon_ayah       =           $request->no_telepon_ayah;
                $new_ppdb->pekerjaan_ayah           =           $request->pekerjaan_ayah;
                $new_ppdb->nama_ibu                 =           $request->nama_ibu;
                $new_ppdb->umur_ibu                 =           $request->umur_ibu;
                $new_ppdb->tanggal_lahir_ibu        =           $request->tanggal_lahir_ibu;
                $new_ppdb->no_telepon_ibu           =           $request->no_telepon_ibu;
                $new_ppdb->pekerjaan_ibu            =           $request->pekerjaan_ibu;
                $new_ppdb->alamat_orang_tua         =           $request->alamat_orang_tua;
                $new_ppdb->email                    =           $request->email;
                $new_ppdb->no_telepon_siswa         =           $request->no_telepon;
                if($request->hasfile('foto_siswa')) {
                    $file_siswa                     =           $request->file('foto_siswa');
                    $nama_file                      =           time().$file_siswa->getClientOriginalName();
                    $path_simpan                    =           'public/foto_pmb_siswa/'.$nama_file;
                    $file_siswa->move(public_path().'/foto_pmb_siswa/',$nama_file);
                    $new_ppdb->foto_siswa_smp       =           $path_simpan;
                }
                $new_ppdb->save();
                return response()->json($new_ppdb);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataGuruTerbaik()
    {
        try {
            $data_guru_terbaik          =        PPDBGuruTerbaikModel::orderBy('id','desc')->get();
            return response()->json($data_guru_terbaik);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SliderPPDB()
    {
        try {
            $data_slider                =       SliderPPDBModel::orderBy('id','desc')->get();
            return response()->json($data_slider);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function InformasiPPDB(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data_informasi             =           InformasiPPDBModel::orderBy('id','desc')->get();
                return response()->json($data_informasi);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function ApaItuPPDB(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data_ppdb                      =               ApaItuPPDBModel::orderBy('id','desc')->get();
                return response()->json($data_ppdb);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function PersyaratanCalonPPDB(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data_persyaratan           =          PersyaratanCalonPesertaDidikModel::orderBy('id','asc')->get();
                return response()->json($data_persyaratan);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}