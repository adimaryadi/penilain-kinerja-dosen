<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');
Route::get('logout','HomeController@logout');
Route::resource('penguna','UsersController');
Route::resource('riwayat_pendidikan','RiyawatPendidikanController');
Route::resource('riwayat_mengajar','RiwayatMengajarController');
Route::resource('riwayat_penelitian','RiwayatPenelitianController');
Route::resource('data_dosen','DataDosenController');
Route::get('biodata','DataDosenController@biodata');
Route::resource('data_penilaian','PenilaianController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('pilih_dosen','PenilaianController@kuisioner');
Route::resource('pelatihan','PelatihanController');
Route::resource('jurnal','JurnalController');
Route::resource('karya_tulis','KaryaTulisController');
Route::resource('penghargaan','PenghargaanController');
Route::resource('daftar_nilai_kuisioner','DaftarNilaiKuisionerController');
Route::get('kuisioner_mahasiswa','PenilaianController@KuisionerMahasiswa');
Route::get('kuisioner_dosen','PenilaianController@KuisionerDosen');
Route::resource('perankingan','PerankinganController');