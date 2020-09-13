<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\RuangKelasModel;
use File;
class AuthentificationController extends Controller
{
    public function Register(Request $request)
    {
        try {
            $token_secret               =           $request->token_secret;
            if (DB::table('oauth_clients')->where('secret',$token_secret)->exists()) {

                if (DB::table('users')->where('email', $request->email)->exists()) {
                    return response()->json(['email_digunakan']);
                } else {
                    $new_users              =           new UsersModel();
                    $new_users->name        =           $request->nama_murid;
                    $new_users->email       =           $request->email;
                    $new_users->password    =           Hash::make($request->password);
                    if($request->hasfile('foto_siswa')) {
                        $foto_user              =           $request->file('foto_siswa');
                        $nama_foto              =           time().$foto_user->getClientOriginalName();
                        $path_foto              =           'public/profil_imgs/'.$nama_foto;
                        $foto_user->move(public_path().'/profil_imgs/',$nama_foto);
                        $new_users->user_img    =            $path_foto;
                    } else {
                        $new_users->user_img    =           'public/profil_imgs/default.png';
                    }
                    if(!empty($request->level == 'murid')) {
                        $new_users->level       =        $request->level;
                    }
                    if(!empty($request->level == 'guru')) {
                        $new_users->level       =        $request->level;
                    }
                    if (!empty($request->nis)) {
                        $new_users->nomor_induk =        $request->nis;
                    }
                    if (!empty($request->nip)) {
                        $new_users->nomor_induk =        $request->nip;
                    }
                    $new_users->nomor_telepon   =        $request->no_telepon;
                    $new_users->alamat          =        $request->alamat_siswa;
                    $new_users->ruang_kelas     =        $request->kelas;
                    $new_users->status          =        'inactive';
                    $new_users->save();
                    return response()->json($new_users);
                }
                 
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    } 

    public function Kelas()
    {
        try {
            $ruang_kelas            =       RuangKelasModel::orderBy('id','desc')->get();
            return response()->json($ruang_kelas);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this module login users 
    public function Login(Request $request)
    {
        try {
            if(DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $find_email                     =       DB::table('users')->where('email', $request->email)->first();
                    $token_login                    =       Hash::make($request->email.$request->password.time());
                    $create_token                   =       DB::table('oauth_access_tokens')->insert([
                        'user_id'    =>   $find_email->id,
                        'client_id'  =>   $find_email->id,
                        'name'       =>   $find_email->name,
                        'id'         =>   $token_login,
                        'revoked'    =>   0
                    ]);
                    return response()->json($token_login);
                } else {
                    return response()->json(['kridensial_salah']);
                }
            } else {
                return response()->json(['Akses ditolak']);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function Login_users(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $find_email                     =       DB::table('users')->where('email', $request->email)->first();
                    if($request->sebagai == $find_email->level) {
                        $token_login                    =       Hash::make($request->email.$request->password.time());
                        $create_token                   =       DB::table('oauth_access_tokens')->insert([
                            'user_id'    =>   $find_email->id,
                            'client_id'  =>   $find_email->id,
                            'name'       =>   $find_email->name,
                            'id'         =>   $token_login,
                            'revoked'    =>   0
                        ]);
                        return response()->json($token_login);
                    } else {
                        return response()->json(['sebagai_salah']);
                    }

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

    // this function cek token_users
    public function token_cek(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                if (DB::table('oauth_access_tokens')->where('id', $request->token)->exists()) {
                    return response()->json(['ok']);
                } else {
                    return response()->json(['logout']);
                }
                
            } else {
                return response()->json(['Akses Ditolak']);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function cek profil login 
    public function Info_user(Request $request) {
        try {
            $find_id                        =       DB::table('oauth_access_tokens')->where('id',$request->token)->get();
            $nomor                          =       count($find_id);
            if($nomor > 0) {
                if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                    $find_users                     =       DB::table('users')->where('id',$find_id[0]->user_id)->get();
                    return response()->json($find_users);
                } else {
                    return response()->json(['Akses Ditolak']);
                }
            } else {
                return response()->json(['logout']);
            }

        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function logout
    public function Logout(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $find_token                  =             DB::table('oauth_access_tokens')->where('id',$request->token_login)->delete();
                return response()->json($find_token);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function PerbaharuiUsers(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $update                         =           UsersModel::find($request->id);
                $update->name                   =           $request->nama;
                $update->email                  =           $request->email;
                $update->nomor_induk            =           $request->nomor_induk;
                if(!empty($request->password)) {
                    $hasPassword                 =           Hash::make($request->password);
                    $update->password           =            $hasPassword;
                }
                if($request->hasfile('file_foto')) {
                    $file_update                =            $request->file('file_foto');
                    $nama_file                  =            time().$file_update->getClientOriginalName();
                    $path_save                  =            'public/profil_imgs/'.$nama_file;
                    if($update->user_img == 'public/profil_imgs/default.png') {
                    } else {
                        $file_delete            =            $update->user_img;
                        File::delete($file_delete);
                    }
                    $file_update->move(public_path().'/profil_imgs/',$nama_file);
                    $update->user_img           =            $path_save;       
                }
                $update->nomor_telepon          =            $request->no_telepon;
                $update->alamat                 =            $request->alamat;
                $update->update();
                return response()->json($update);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function RegisterAlumni(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                if (DB::table('users')->where('email', $request->email)->exists()) {
                    return response()->json(['email_ada']);
                } else {
                    $users                      =                  new UsersModel();
                    $users->name                =                  $request->nama;
                    $users->email               =                  $request->email;
                    $hasPassword                =                  Hash::make($request->password);
                    $users->password            =                  $hasPassword;
                    $users->level               =                  'alumni';
                    $users->nomor_telepon       =                  $request->no_telepon;
                    $users->status              =                  'inactive';
                    $users->nomor_induk         =                  $request->angkatan;
                    $users->alamat              =                  $request->alamat;
                    if ($request->hasfile('foto_profil')) {
                        $foto_profil            =                  $request->file('foto_profil');
                        $nama_foto              =                  time().$foto_profil->getClientOriginalName();
                        $path_simpan            =                  'public/profil_imgs/'.$nama_foto;
                        $foto_profil->move(public_path().'/profil_imgs/',$nama_foto);
                        $users->user_img        =                  $path_simpan;
                    }
                    $users->save();
                    return response()->json($users);                  
                }
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataAlumniPerangkatan(Request $request) 
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $find_user                      =           DB::table('oauth_access_tokens')->where('id', $request->token_user)->first();
                $find_id_user                   =           UsersModel::find($find_user->user_id);
                $angkatan                       =           $find_id_user->nomor_induk;
                $data_angkatan                  =           DB::table('users')->where('nomor_induk',$angkatan)->get();
                return response()->json($data_angkatan);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());   
        }
    }
}
