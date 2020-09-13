<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageTentangKamiTutorTerbaikModel;
use App\SliderTentangKamiModel;
use Illuminate\Support\Facades\DB;
use App\VisiMisiTentangKamiModel;
use App\MisiTentangKamiModel;
use App\JurusanSekolahModel;
use App\SejarahSekolahModel;
use App\DataPrestasiModel;
class PageTentangKamiController extends Controller
{
    public function DataBoxTentangKami()
    {
        try {
            $data                   =            PageTentangKamiTutorTerbaikModel::orderBy('id','desc')->get();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataSliderTestimonial()
    {
        try {
            $data_slider            =           SliderTentangKamiModel::orderBy('id','desc')->get();
            return response()->json($data_slider);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function visi(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                   =               DB::table('visi_misi')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function misi(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                    =              DB::table('misi_tentang_kami')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function JurusanSekolah(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_jurusan                 =             JurusanSekolahModel::orderBy('id','desc')->get();
                return response()->json($data_jurusan);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SejarahSekolah(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_sejarah               =           SejarahSekolahModel::orderBy('id','desc')->get();
                return response()->json($data_sejarah);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function PrestasiSekolah(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data_prestasi              =           DataPrestasiModel::orderBy('id','desc')->get();
                return response()->json($data_prestasi);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}