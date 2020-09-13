<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SliderHomeModel;
use App\HomeContentsProductTwoModel;
use App\LogoOurClientsModel;
use Illuminate\Support\Facades\DB;
use App\HomeSelamatDatangModel;
use App\SmartSchoolModel;
use App\GuruMilenialModel;
use App\HomeRuangInformasiModel;
use App\LogoHeader;
use App\HomeStatistikModel;
class HomeController extends Controller
{
    //
    public function Slider_home() 
    {
        try {
            $slider_home        =       SliderHomeModel::orderBy('id','desc')->get();
            return response()->json($slider_home);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    // ini sumber data konten di home
    public function Data_Konten_Home()
    {
        try {
            $Data_konten        =       HomeContentsProductTwoModel::orderBy('id','desc')->get();
            return response()->json($Data_konten);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function Data_Our_clients()
    {
        try {
           $data_logo               =       LogoOurClientsModel::orderBy('id','desc')->get();
           return response()->json($data_logo);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataSelamatDatang(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                            =          HomeSelamatDatangModel::orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function SmartSchool(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                      =            SmartSchoolModel::orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function GuruMilenial(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data           =           GuruMilenialModel::orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function HomeRuangInformasi(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                   =           HomeRuangInformasiModel::orderBy('id','desc')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function LogoApps(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $logo                   =           LogoHeader::orderBy('id','desc')->get();
                return response()->json($logo);
            } else {
                return response()->json(['Akses Ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function HomeStatistik(Request $request)
    {
        try {
            if (DB::table('oauth_clients')->where('secret',$request->token_secret)->exists()) {
                $data                   =               DB::table('homestatistik')->get();
                return response()->json($data);
            } else {
                return response()->json(['Akses ditolak']);
            }
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
