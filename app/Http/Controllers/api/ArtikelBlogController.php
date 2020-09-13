<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ArtikelModel;
use Illuminate\Support\Facades\Auth;
use App\KategoriArtikelModel;
use Illuminate\Support\Facades\Hash;
use File;
use App\KomentarArtikelModel;
class ArtikelBlogController extends Controller
{
    public function DataArtikelBlog()
    {
        try {
            $artikel_blog               =           ArtikelModel::orderBy('id','desc')->get();
            return response()->json($artikel_blog);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataArtikelPerUser(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $find_id                      =            DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $artikel_data                 =            DB::table('artikel_blog')->where('id_users_post',$find_id->user_id)->orderBy('id','desc')->get();
                return response()->json($artikel_data);           
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
    public function DetailArtikelBlog(Request $request)
    {
        try {
            $artikel                    =        $request->artikel;
            $data                       =        DB::table('artikel_blog')->where('link_url',$artikel)->first();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function ReportKlikArtikel(Request $request)
    {
        try {
            $artikel                =          $request->artikel;
            $data                   =          DB::table('artikel_blog')->where('link_url',$artikel)->first();
            $jumlah_klik            =          $data->jumlah_pembaca;
            $tambah_satu            =          $jumlah_klik+1;
            $klik                   =          DB::table('artikel_blog')->where('id',$data->id)->update([
                'jumlah_pembaca' => $tambah_satu
            ]);
            return response()->json($tambah_satu);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SeringDibaca()
    {
        try {
            $data                  =         DB::table('artikel_blog')->avg('jumlah_pembaca');
            $float                 =         (float)$data;
            $hasil_data            =         [];
            $artikel               =         ArtikelModel::orderBy('id','desc')->get();
            foreach ($artikel as $hasil) {
                if($hasil->jumlah_pembaca >= $float) {
                    array_push($hasil_data, $hasil);
                }
            }
            return response()->json($hasil_data);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function CariData(Request $request)
    {
        try {
            $hasil_cari                 =       DB::table('artikel_blog')->where('judul_artikel',$request->cari)->orwhere('kategori_artikel',$request->cari)->get();
            return response()->json($hasil_cari);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function PostArtikel(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $simpan_data                    =           new ArtikelModel();
                $find_id                        =           DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $data_users                     =           DB::table('users')->where('id',$find_id->user_id)->first();
                $nama_users                     =           $data_users->name;
                $id_users                       =           $data_users->id;
                $posting                        =           new ArtikelModel();
                $posting->judul_artikel         =           $request->judul_artikel;
                $posting->post_users            =           $nama_users;
                if($request->hasfile('file_gambar')) {
                    $file_artikel               =           $request->file('file_gambar');
                    $nama_file                  =           time().$file_artikel->getclientOriginalName();
                    $path_simpan                =           'public/foto_artikel/'.$nama_file;
                    $file_artikel->move(public_path().'/foto_artikel/',$nama_file);
                    $posting->foto_artikel      =           $path_simpan;
                }      
                $posting->kategori_artikel      =           $request->kategori_artikel;
                $posting->id_users_post         =           $id_users;
                $posting->kontent_artikel       =           $request->deskripsi;
                $kode_acak                      =           date("Y-m-d h:i:sa");
                $link_url                       =           str_replace(' ','-',strtolower($request->judul_artikel));
                $posting->link_url              =           $link_url.'-'.$kode_acak;
                $posting->izin_post             =           'inactive';
                $posting->save();
                return response()->json($posting);
            }  else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function Kategori_artikel(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $DataKategoriArtikel                        =                   KategoriArtikelModel::orderBy('id','desc')->get();
                return response()->json($DataKategoriArtikel);
            }  else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this data artikel

    public function DataArtikel(Request $request)
    {
        try {
            if(DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) { 
                $find_id                      =            DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $data_artikel                 =            DB::table('artikel_blog')->where('id_users_post', $find_id->user_id)->orderBy('id','desc')->get();
                return response()->json($data_artikel);
            } else {
                return response()->json(['Akses_ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // data perbaharui 
    public function DataPerbaharui(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data               =           ArtikelModel::find($request->id);
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // Perbaharui Artikel
    public function PerbaharuiArtikel(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $perbaharui                     =           ArtikelModel::find($request->id);
                $find_token                     =           DB::table('oauth_access_tokens')->where('id',$request->token)->first();
                $find_users                     =           DB::table('users')->where('id',$find_token->user_id)->first();
                $perbaharui->judul_artikel      =           $request->judul_artikel;
                $perbaharui->post_users         =           $find_users->name;
                $perbaharui->id_users_post      =           $find_users->id;
                if ($request->hasfile('file_foto')) {
                    $file_perbaharui            =           $request->file('file_foto');
                    $nama_file                  =           time().$file_perbaharui->getClientOriginalName();
                    $path_update                =           'public/foto_artikel/'.$nama_file;
                    $path_delete                =           $perbaharui->foto_artikel;
                    File::delete($path_delete);
                    $file_perbaharui->move(public_path().'/foto_artikel/', $nama_file);
                    $perbaharui->foto_artikel   =           $path_update;
                }
                $perbaharui->kategori_artikel   =           $request->kategori_artikel;
                $perbaharui->kontent_artikel    =           $request->kontent_artikel;
                $kode_acak                      =           date("Y-m-d h:i:sa");
                $link_url                       =           str_replace(' ','-',strtolower($request->judul_artikel));
                $perbaharui->link_url           =           $link_url.'-'.$kode_acak;
                $perbaharui->update();
                return response()->json($perbaharui);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function delete article
    public function HapusArticle(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $delete                  =          ArtikelModel::find($request->id);
                $file_file               =          $delete->foto_artikel;
                File::delete($file_file);
                $delete->delete();
                return response()->json($delete);
            } else {
                return response()->json(['Akses_Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function data footer 
    public function DataArtikelFooter(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data_artikel                =          ArtikelModel::orderBy('id','desc')->paginate(7);
                return response()->json($data_artikel);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function komentar artikel users
    public function KomentarArtikelLogin(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $kridensial             =           $request->only('email','password');

                if (Auth::attempt($kridensial)) {
                    $id_artikel         =           $request->id_artikel;
                    $data_komentar      =           DB::table('artikel_blog')->where('link_url', $id_artikel)->first();
                    $data_users         =           DB::table('users')->where('email',$request->email)->first();

                    $komentar                =           new KomentarArtikelModel();
                    $komentar->id_artikel    =           $data_komentar->id;
                    $komentar->id_users      =           $data_users->id;
                    $komentar->nama_komentar =           $data_users->name;
                    $komentar->path_foto     =           $data_users->user_img;
                    $komentar->komentar      =           $request->komentar;
                    $komentar->save();
                    $create_token       =           Hash::make(time());
                    $save_token         =           DB::table('oauth_access_tokens')->insert([
                        'id'        => $create_token,
                        'user_id'   => $data_users->id,
                        'client_id' => $data_users->id,
                        'name'      => $data_users->name,
                        'revoked'   => 0
                    ]);
                    $data_kirim         =       [
                        'token' => $create_token,
                        'users' => $data_users
                    ];
                    return response()->json($data_kirim);
                } else {
                    return response()->json(['kridensial_salah']);
                }
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function datakomentar perpage
    public function DataKomentar(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $temukan_artikel                =        DB::table('artikel_blog')->where('link_url',$request->artikel_id)->first();
                $data_komentar                  =        DB::table('komentar_artikel')->where('id_artikel',$temukan_artikel->id)->orderBy('id','desc')->get();
                return response()->json($data_komentar);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
             return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function komentar sudah login 
    public function KomentarSudahLogin(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $idenfikasi_user                =       DB::table('oauth_access_tokens')->where('id', $request->token)->first();
                $id                             =       $idenfikasi_user->user_id;
                $users_find                     =       DB::table('users')->where('id',$id)->first();
                $temukan_artikel                =       DB::table('artikel_blog')->where('link_url', $request->id_artikel)->first();
                $id_artikel                     =       $temukan_artikel->id;
                $komentar                       =       new KomentarArtikelModel();
                $komentar->id_artikel           =       $temukan_artikel->id;
                $komentar->id_users             =       $users_find->id;
                $komentar->nama_komentar        =       $users_find->name;
                $komentar->path_foto            =       $users_find->user_img;
                $komentar->komentar             =       $request->komentar;
                $komentar->save();
                return response()->json($komentar);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function dataUpadate Komentar
    public function DataUpdateKomentar(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $data                       =               KomentarArtikelModel::find($request->id);
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function update data komentar 
    
    public function UpdateKomentarArtikel(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $update                         =           KomentarArtikelModel::find($request->id);
                $update->komentar               =           $request->komentar;
                $update->update();
                return response()->json($update);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function delete komentar
    public function hapusKomentar(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                if (!empty($request->id)) {
                    $hapusKomentar                  =           KomentarArtikelModel::find($request->id);
                    $hapusKomentar->delete();
                    return response()->json($hapusKomentar);
                } else {
                    return response()->json(['Sudah Terhapus']);
                }
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
