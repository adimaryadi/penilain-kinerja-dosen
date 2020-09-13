<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\UnitKerjaHelpModel;
use App\UnitKerjaSliderModel;
use App\SaranaDanPrasaranaModel;
use App\UnitKerjaFasilitasSekolahModel;
class PageUnitkerjaController extends Controller
{
    public function Form_Help_unit_kerja(Request $request)
    {
        try {
            $email              =       $request->email;
            if(DB::table('unit_kerja_help')->where('email', $email)->exists()) {
                return response()->json('email_ada');
            } else {
                $simpan_permintaan              =       new UnitKerjaHelpModel();
                $simpan_permintaan->nama        =       $request->nama;
                $simpan_permintaan->no_telepon  =       $request->no_telepon;
                $simpan_permintaan->email       =       $request->email;
                $simpan_permintaan->pesan       =       $request->pesan;
                $simpan_permintaan->save();
                return response()->json($simpan_permintaan);
            }
            
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // this function request data slider
    public function Data_slider()
    {
        try {
            $data_slider            =       UnitKerjaSliderModel::orderBy('id','desc')->get();
            return response()->json($data_slider);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // sub menu unit kerja
    public function MenuUnitKerja(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_unit_kerja             =              DB::table('menu_page_unit_kerja')->orderBy('id','asc')->get();
                return response()->json($data_unit_kerja);
            } else {
                return response()->json(['Akses ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DetailMenuPageUnitKerja(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $detail                      =             DB::table('menu_page_unit_kerja')->where('link_menu',$request->link_menu)->get();
                $hitung                      =             count($detail);
                if ($hitung >= 1) {
                     return response()->json($detail);
                } else {
                    return response()->json(['kosong']);
                }
            } else {
                return response()->json(['Akses ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SaranaDanPrasarana(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_sarana_prasarana              =               SaranaDanPrasaranaModel::orderBy('id','asc')->get();
                return response()->json($data_sarana_prasarana);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function FasilitasSekolah(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_fasilitas             =               UnitKerjaFasilitasSekolahModel::orderBy('id','desc')->get();
                return response()->json($data_fasilitas);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
