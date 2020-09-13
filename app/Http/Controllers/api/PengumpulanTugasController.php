<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PengumpulanTugasModel;
use Illuminate\Support\Facades\DB;
use File;
class PengumpulanTugasController extends Controller
{
    public function UploadTugasMurid(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $token_find                      =              DB::table('oauth_access_tokens')->where('id', $request->token)->first();
                $find_users                      =              DB::table('users')->where('id', $token_find->user_id)->first();
                $find_tugas_sekolah              =              DB::table('tugas_sekolah')->where('id', $request->id)->first();

                $id_murid                        =              $find_users->id;
                $nama_murid                      =              $find_users->name;
                $kelas                           =              $find_users->ruang_kelas;
                $nomor_induk                     =              $find_users->nomor_induk;
                $pelajaran                       =              $find_tugas_sekolah->judul_tugas;
                $kadaluarsa                      =              $find_tugas_sekolah->kadaluarsa_tugas;
                $id_murid_simpan                 =              $id_murid.$pelajaran;
                $day_now                         =              date("Y-m-d");
                if($day_now > $kadaluarsa) {
                    return response()->json(['tugas_kadaluarsa']);
                } else {
                    if(DB::table('pengumpulan_tugas')->where('id_murid',$id_murid_simpan)->exists()) {
                        return response()->json(['tugas_sudah_diupload']);
                    } else {
                        $new_tugas                   =             new  PengumpulanTugasModel();
                        $new_tugas->pelajaran        =             $pelajaran;
                        $new_tugas->id_tugas         =             $request->id;
                        $new_tugas->id_murid         =             $id_murid_simpan;
                        $new_tugas->nama_murid       =             $nama_murid;
                        $new_tugas->kelas            =             $kelas;
                        $new_tugas->nis              =             $nomor_induk;
                        if ($request->hasfile('file_tugas')) {
                            $file_tugas              =             $request->file('file_tugas');
                            $nama_file               =             time().$file_tugas->getClientOriginalName();
                            $path_save               =             'public/file_tugas_murid/'.$nama_file;
                            $file_tugas->move(public_path().'/file_tugas_murid/',$nama_file);
                            $new_tugas->file_tugas   =             $path_save;
                        }
                        $new_tugas->save();
                        return response()->json($new_tugas);
                    }
                }

                
            } else {
                return response()->json(['Akses ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
