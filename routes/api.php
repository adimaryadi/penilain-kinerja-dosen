<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 

// Route::post('ppdb_persyaratan','api\PPDBSiswaController@PersyaratanCalonPPDB');
// Route::get('slider_home','api\HomeController@Slider_home');
// Route::post('unit_kerja_pertolognan','api\PageUnitkerjaController@Form_Help_unit_kerja');
// Route::get('Data_slider_unit_kerja','api\PageUnitkerjaController@Data_slider');
// Route::get('data_siswa_bootcamp','api\SiswaBootcampController@DataBootcampSiswa');
// Route::get('DataSliderBootcampSiswa','api\SiswaBootcampController@DataSliderBootcampSiswa');
// Route::get('Data_Konten_Home','api\HomeController@Data_Konten_Home');
// Route::get('Data_Our_clients','api\HomeController@Data_Our_clients');
// Route::get('KategoriSiswaProduk','api\SiswaBootcampController@KategoriSiswaProduk');
// Route::get('DataSiswaProduk','api\SiswaBootcampController@DataSiswaProduk');
// Route::post('PPDB_penerimaan','api\PPDBSiswaController@PPDB_penerimaan');
// Route::get('data_guru_terbaik','api\PPDBSiswaController@DataGuruTerbaik');
// Route::get('slider_ppdb','api\PPDBSiswaController@SliderPPDB');
// Route::get('box_data_ppdb','api\PageTentangKamiController@DataBoxTentangKami');
// Route::get('slider_testimonial_tentang_kami','api\PageTentangKamiController@DataSliderTestimonial');
// Route::get('data_artikel_blog','api\ArtikelBlogController@DataArtikelBlog');
// Route::post('report_artikel','api\ArtikelBlogController@ReportKlikArtikel');
// Route::post('detail_artikel','api\ArtikelBlogController@DetailArtikelBlog');
// Route::get('sering_dibaca','api\ArtikelBlogController@SeringDibaca');
// Route::post('cari','api\ArtikelBlogController@CariData');
// Route::post('register','api\AuthentificationController@Register');
// Route::post('Login','api\AuthentificationController@Login');
// Route::get('Kelas','api\AuthentificationController@Kelas');
// Route::post('Login_users','api\AuthentificationController@Login_users');
// Route::post('token_cek','api\AuthentificationController@token_cek');
// Route::post('Info_user','api\AuthentificationController@Info_user');
// Route::post('TugasSekolahGuru','api\TugasSekolahController@TugasSekolahGuru');
// Route::post('FileTugasMurid','api\TugasSekolahController@FileTugasMurid');
// Route::post('SimpanTugas','api\TugasSekolahController@SimpanTugas');
// Route::post('download_tugas','api\TugasSekolahController@DownloadTugas');
// Route::post('PerbaharuiTugas','api\TugasSekolahController@PerbaharuiTugas');
// Route::post('SimpanPembaharuan','api\TugasSekolahController@SimpanPembaharuan');
// Route::post('TugasHapus','api\TugasSekolahController@TugasHapus');
// Route::post('Logout','api\AuthentificationController@Logout');
// Route::post('PerbaharuiUsers','api\AuthentificationController@PerbaharuiUsers');
// Route::post('DataTugasMurid','api\TugasSekolahController@DataTugasMurid');
// Route::post('UploadTugasMurid','api\PengumpulanTugasController@UploadTugasMurid');
// Route::post('TugasYangDikumpulkan','api\TugasSekolahController@TugasYangDikumpulkan');
// Route::post('BeriNilaiTugas','api\TugasSekolahController@BeriNilaiTugas');
// Route::post('CekMuridNilai','api\TugasSekolahController@CekMuridNilai');
// Route::post('HapusPengumpulanTugas','api\TugasSekolahController@HapusPengumpulanTugas');
// Route::post('PostArtikel','api\ArtikelBlogController@PostArtikel');
// Route::post('Kategori_artikel','api\ArtikelBlogController@Kategori_artikel');
// Route::post('DataArtikel','api\ArtikelBlogController@DataArtikelBlog');
// Route::post('data_artikel_peruser','api\ArtikelBlogController@DataArtikelPerUser');
// Route::post('DataPerbaharuiArtikel','api\ArtikelBlogController@DataPerbaharui');
// Route::post('PerbaharuiArtikel','api\ArtikelBlogController@PerbaharuiArtikel');
// Route::post('HapusArticle','api\ArtikelBlogController@HapusArticle');
// Route::post('DataArtikelFooter','api\ArtikelBlogController@DataArtikelFooter');
// Route::post('KomentarArtikelLogin','api\ArtikelBlogController@KomentarArtikelLogin');
// Route::post('DataKomentar','api\ArtikelBlogController@DataKomentar');
// Route::post('KomentarSudahLogin','api\ArtikelBlogController@KomentarSudahLogin');
// Route::post('DataUpdateKomentar','api\ArtikelBlogController@DataUpdateKomentar');
// Route::post('UpdateKomentarArtikel','api\ArtikelBlogController@UpdateKomentarArtikel');
// Route::post('hapusKomentar','api\ArtikelBlogController@hapusKomentar');
// Route::post('DataSelamatDatang','api\HomeController@DataSelamatDatang');
// Route::post('smart_school','api\HomeController@SmartSchool');
// Route::post('guru_milenial','api\HomeController@GuruMilenial');
// Route::post('ruang_informasi','api\HomeController@HomeRuangInformasi');
// Route::post('logo_apps','api\HomeController@LogoApps');
// Route::post('home_statistik','api\HomeController@HomeStatistik');
// Route::post('visi','api\PageTentangKamiController@visi');
// Route::post('misi','api\PageTentangKamiController@misi');
// Route::post('data_berita','api\BeritaController@DataBerita');
// Route::post('klik_berita','api\BeritaController@KlikPembacaBerita');
// Route::post('berita_detail','api\BeritaController@BeritaDetail');
// Route::post('berita_lainya','api\BeritaController@BeritaLaininya');
// Route::post('komentar_berita','api\BeritaController@KomentarBerita');
// Route::post('daftar_komentar_berita','api\BeritaController@DataKomentarPerBerita');
// Route::post('data_komentar_perbaharui','api\BeritaController@DataPerbaharuiKomentar');
// Route::post('komentar_perbaharui','api\BeritaController@KomentarBeritaPerbaharui');
// Route::post('hapus_komentar_berita','api\BeritaController@HapusKomentarBerita');
// Route::post('menu_page_unit_kerja','api\PageUnitkerjaController@MenuUnitKerja');
// Route::post('detail_menu_unit_kerja','api\PageUnitkerjaController@DetailMenuPageUnitKerja');
// Route::post('gallery_configurasi_background','api\GalleryController@ConfigurasiGallery');
// Route::post('daftar_gallery','api\GalleryController@DaftarGallery');
// Route::post('detail_gallery','api\GalleryController@DetailGallery');
// Route::post('cari_foto_gallery','api\GalleryController@CariFotoGallery');
// Route::post('jurusan_tentang_kami','api\PageTentangKamiController@JurusanSekolah');
// Route::post('register_alumni','api\AuthentificationController@RegisterAlumni');
// Route::post('data_alumni_perangkatan','api\AuthentificationController@DataAlumniPerangkatan');
// Route::post('sarana_prasarana_data','api\PageUnitkerjaController@SaranaDanPrasarana');
// Route::post('cek_tugas_murid','api\TugasSekolahController@CekTugasMurid');
// Route::post('sejarah_sekolah_tentang_kami','api\PageTentangKamiController@SejarahSekolah');
// Route::post('prestasi_sekolah','api\PageTentangKamiController@PrestasiSekolah');
// Route::post('fasilitas_sekolah','api\PageUnitkerjaController@FasilitasSekolah');
// Route::post('informasi_ppdb','api\PPDBSiswaController@InformasiPPDB');
// Route::post('apa_itu_ppdb','api\PPDBSiswaController@ApaItuPPDB');