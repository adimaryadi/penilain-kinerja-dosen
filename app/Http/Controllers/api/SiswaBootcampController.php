<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiswaBootcampModel;
use App\SliderSiswaBootcampModel;
use App\Kategori_product_siswa_bootcampModel;
use App\SiswaProductBootcampModel;
class SiswaBootcampController extends Controller
{
    public function DataBootcampSiswa()
    {
        try {
            $siswa_bootcamp             =       SiswaBootcampModel::orderBy('id','desc')->get();
            return response()->json($siswa_bootcamp);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataSliderBootcampSiswa()
    {
        try {
            $data_slider                =       SliderSiswaBootcampModel::orderBy('id','desc')->get();
            return response()->json($data_slider);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function KategoriSiswaProduk()
    {
        try {
            $kategori_produk_siswa      =       Kategori_product_siswa_bootcampModel::orderBy('id','asc')->get();
            return response()->json($kategori_produk_siswa);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }

    public function DataSiswaProduk()
    {
        try {
            $data_siswa_produk         =       SiswaProductBootcampModel::orderBy('id','asc')->get();
            return response()->json($data_siswa_produk);
        } catch (Exception $e) {
            return response()->exception($e->getMessage(), $e->getCode());
        }
    }
}
