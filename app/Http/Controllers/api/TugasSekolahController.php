<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TugasSekolahModel;
use Illuminate\Support\Facades\DB;
use App\PengumpulanTugasModel;
use File;

class TugasSekolahController extends Controller
{
    public function TugasSekolahGuru(Request $request)
    {
        try {
            if(DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data_tugas                     =                   TugasSekolahModel::orderBy('id','desc')->get();
                return response()->json($data_tugas);
            } else {
                return response()->json(['Akses Ditolak']);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function FileTugasMurid(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $file_data                      =           $request->file('file_tugas');
                $nama_file                      =           time().$file_data->getClientOriginalName();
                $path_simpan                    =           'public/tugas_sekolah/'.$nama_file;
                $file_data->move(public_path().'/tugas_sekolah/',$nama_file);
                $data_result[]                  =           (object) array('nama_file' => $nama_file,'path_file' => $path_simpan);
                return response()->json($data_result);
            } else {
                return response()->json(['Akses_ditolak']);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SimpanTugas(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $simpan_tugas                       =        new TugasSekolahModel();
                $simpan_tugas->judul_tugas          =        $request->judul_tugas;
                $simpan_tugas->dari_guru            =        $request->akses_sebagai.' - '.$request->nama_pengirim;
                $simpan_tugas->pelajaran            =        $request->pelajaran;
                $simpan_tugas->file_tugas           =        $request->path_file;
                $simpan_tugas->kelas                =        $request->tugas_untuk;
                $simpan_tugas->deskripsi_tugas      =        $request->deskripsi_tugas;
                $simpan_tugas->kadaluarsa_tugas     =        $request->tugas_kadaluarsa;
                $simpan_tugas->save();
                return response()->json($simpan_tugas);
            } else {
                return response()->json(['Akses_ditolak']);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DownloadTugas(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $id                         =           TugasSekolahModel::find($request->id);
            } else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function PerbaharuiTugas(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $id                         =           DB::table('tugas_sekolah')->where('id',$request->id)->get();
                return response()->json($id);
            } else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SimpanPembaharuan(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $id                         =          $request->id;
                $update_tugas               =          TugasSekolahModel::find($id);
                $update_tugas->judul_tugas  =          $request->judul_tugas;
                $update_tugas->pelajaran    =          $request->pelajaran;
                if ($request->hasfile('file_tugas')) {
                    $file_update                =          $request->file('file_tugas');
                    $nama_file                  =          time().$file_update->getClientOriginalName();
                    $path_simpan                =          'public/tugas_sekolah/'.$nama_file;
                    $file_delete                =          $update_tugas->file_tugas;
                    File::delete($file_delete);
                    $file_update->move(public_path().'/tugas_sekolah/',$nama_file);
                    $update_tugas->file_tugas   =          $path_simpan;
                }
                $update_tugas->kelas            =          $request->tugas_untuk;
                $update_tugas->deskripsi_tugas  =          $request->deskripsi_tugas;
                if(!empty($request->tanggal_kadaluarsa)) {
                    $update_tugas->kadaluarsa_tugas =          $request->tanggal_kadaluarsa;
                }
                $update_tugas->update();
                return response()->json($update_tugas);
            } else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function TugasHapus(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $id                                 =            $request->id;
                $hapus                              =            TugasSekolahModel::find($id);
                $file_delete                        =            $hapus->file_tugas;
                File::delete($file_delete);
                $hapus->delete();
                return response()->json($hapus);
            } else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this tugas murid 
    public function DataTugasMurid(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data                               =       DB::table('tugas_sekolah')->where('kelas', $request->kelas)->orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this who student send task to teacher only teacher can read this dataArtikelBlog
    public function TugasYangDikumpulkan(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $find_identification            =           DB::table('oauth_access_tokens')->where('id', $request->token)->first();
                $users_find                     =           DB::table('users')->where('id',$find_identification->user_id)->first();
                if($users_find->level == 'guru') {
                    $kumpulan_tugas             =           DB::table('pengumpulan_tugas')->where('id_tugas', $request->id)->orderBy('id','desc')->get();
                    return response()->json($kumpulan_tugas);
                } else {
                    return response()->json(['tidak_diizinkan']);
                }
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function BeriNilaiTugas(Request $request)
    {
        try {
            if(DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $find_identification            =           DB::table('oauth_access_tokens')->where('id', $request->token)->first();
                $users_find                     =           DB::table('users')->where('id',$find_identification->user_id)->first();
                if($users_find->level == 'guru') {
                    $update                     =           PengumpulanTugasModel::find($request->id);
                    $update->nilai_tugas        =           $request->nilai_tugas;
                    $update->update();
                    return response()->json($update);
                } else {
                    return response()->json(['tidak_diizinkan']);
                }                
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }  
    
    // this cek nilai tugas
    public function CekMuridNilai(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $find_token                     =           DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $data                           =           DB::table('pengumpulan_tugas')->where('id_murid',$find_token->user_id.$request->pelajaran)->first();
                return response()->json($data);
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    //pengumpulan tugas hapus
    public function HapusPengumpulanTugas(Request $request)
    {
        try {
            if(DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $find_token                             =           DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $find_users                             =           DB::table('users')->where('id',$find_token->user_id)->first();
                if($find_users->level == 'guru') {
                    $find_delete                        =           PengumpulanTugasModel::find($request->id);
                    $delete_file                        =           $find_delete->file_tugas;
                    File::delete($delete_file);
                    $find_delete->delete();
                    return response()->json($find_delete);
                } else {
                    return response()->json(['Akses_ditolak']);
                }
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function CekTugasMurid(Request $request)
    {   
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data               =           PengumpulanTugasModel::orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
