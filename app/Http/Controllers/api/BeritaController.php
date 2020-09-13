<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\BeritaModel;
use App\KomentarBeritaModel;
use File;
class BeritaController extends Controller
{
    public function DataBerita(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$data 					 = 						BeritaModel::orderBy('id','desc')->get();
    			return response()->json($data);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }

    public function KlikPembacaBerita(Request $request)
    {
         try {
             if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                 $berita                      =             $request->berita;
                 $data                        =             DB::table('berita')->where('link_berita',$berita)->first();
                 $jumlah_klik                 =             $data->jumlah_pembaca;
                 $tambah_satu                 =             $jumlah_klik+1;
                 $klik                        =             DB::table('berita')->where('link_berita',$berita)->update([
                    'jumlah_pembaca' => $tambah_satu
                 ]);
                 return response()->json($tambah_satu);
             } else {
                return response()->json(['Akses Ditolak']);
             }
         } catch (Exception $e) {
             return response()->exception($e->getMessage(), $e->getCode());
         }
    }

    public function BeritaDetail(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $detail_berita                =            DB::table('berita')->where('link_berita',$request->berita)->get();
                $jumlah_data                  =            count($detail_berita);
                $kirim_group                  =            [
                    'berita' => $detail_berita,
                    'jumlah' => $jumlah_data
                ];
                if ($jumlah_data == 0) {
                    return response()->json(['data_kosong']);
                } else {
                    return response()->json($detail_berita);
                }
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function BeritaLaininya(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $temukan_detail                =           DB::table('berita')->where('link_berita',$request->berita)->first();
                $perkategori                   =           DB::table('berita')->where('kategori_berita',$temukan_detail->kategori_berita)->orderBy('id','desc')->get();
                return response()->json($perkategori);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function KomentarBerita(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $temukan_berita                 =          DB::table('berita')->where('link_berita',$request->berita)->first();
                $id_berita                      =          $temukan_berita->id;
                $komentar_berita                =          new KomentarBeritaModel();
                $komentar_berita->komentar      =          $request->komentar;
                $komentar_berita->id_google     =          $request->id_google;
                $komentar_berita->email         =          $request->email;
                $komentar_berita->id_berita     =          $id_berita;
                $komentar_berita->foto_gambar   =          $request->foto_profil;
                $komentar_berita->nama          =          $request->nama;
                $komentar_berita->save();
                return response()->json($komentar_berita);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataKomentarPerBerita(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
                $cari_berita                    =             DB::table('berita')->where('link_berita', $request->berita)->first();
                $id_berita                      =             $cari_berita->id;
                $data_komentar                  =             DB::table('komentar_berita')->where('id_berita',$id_berita)->orderBy('id','desc')->get();
                return response()->json($data_komentar);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataPerbaharuiKomentar(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$edit 	 		 	 	  = 		 	KomentarBeritaModel::find($request->id_berita);
    			return response()->json($edit);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }

    public function KomentarBeritaPerbaharui(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$PerbaharuiKomentar 			 = 		 	 	KomentarBeritaModel::find($request->id_komentar);
    			$PerbaharuiKomentar->komentar 	 = 			 	$request->komentar;
    			$PerbaharuiKomentar->update();
    			return response()->json($PerbaharuiKomentar);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }

    public function HapusKomentarBerita(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$hapus 							 = 			   KomentarBeritaModel::find($request->id_komentar);
    			$hapus->delete();
    			return response()->json($hapus);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }
}
