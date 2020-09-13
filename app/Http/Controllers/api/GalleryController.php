<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\GalleryModel;
use App\ConfigGalleryModel;
class GalleryController extends Controller
{
    public function ConfigurasiGallery(Request $request) 
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$config_gallery_background 	 	  	= 	 		 	ConfigGalleryModel::orderBy('id','desc')->get();
    			return response()->json($config_gallery_background);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }

    public function DaftarGallery(Request $request) 
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$data_gallery 	 	 	 	 	   	 = 			  	GalleryModel::orderBy('id','desc')->get();
    			return response()->json($data_gallery);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());	
    	}
    }

    public function DetailGallery(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$data_temukan 	 	 		= 	 			 DB::table('gallery')->where('link_gallery',$request->detail_gallery)->get();
    			$hitung 	 		 	 	= 	 	  	 	count($data_temukan);
    			if ($hitung >= 1) {
    				return response()->json($data_temukan);
    			} else {
    				return response()->json(['data_kosong']);
    			}
    			
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());
    	}
    }

    public function CariFotoGallery(Request $request)
    {
    	try {
    		if (DB::table('oauth_clients')->where('secret', $request->token_secret)->exists()) {
    			$data_foto 	 			 	 	= 	 	 	DB::table('foto_gallery')->where('kategori_gallery',$request->kategori_gallery)->get();
    			return response()->json($data_foto);
    		} else {
    			return response()->json(['Akses Ditolak']);
    		}
    	} catch (Exception $e) {
    		return response()->exception($e->getMessage(), $e->getCode());	
    	}
    }
}
