@extends('home')
@section('kuisioner_mahasiswa')
    <div class="kuisioner">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Kuisioner Mahasiswa</h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama: </label>
                                <select class="form-control" name="kuisioner">
                                    <option>Pilihan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kuisioner: </label>
                            <select class="form-control" name="kuisioner">
                                <option>Pilihan</option>
                                <option value="Monitoring dan evaluasi serta persiapan proses pembelajaran dilakukan setiap semester di tingkat Program Studi">Monitoring dan evaluasi serta persiapan proses pembelajaran dilakukan setiap semester di tingkat Program Studi</option>
                                <option value="Kurikulum/materi pembelajaran yang ada sekarang sangat relevan dengan realitas dunia professional">Kurikulum/materi pembelajaran yang ada sekarang sangat relevan dengan realitas dunia professional</option>
                                <option value="Tersedia buku pedoman mengenai tugas/ kewajiban dosen wali dan panduan pembimbingan">Tersedia buku pedoman mengenai tugas/ kewajiban dosen wali dan panduan pembimbingan</option>
                                <option value="Pembimbingan tugas akhir dilakukan minimal 8 kali pertemuan dan semua terdokumentasi dengan baik">Pembimbingan tugas akhir dilakukan minimal 8 kali pertemuan dan semua terdokumentasi dengan baik</option>
                                <option value="Terdapat sarana/ kegiatan yang memfasilitasi dosen untuk menyampaikan/ menyebarluaskan pendapat atau hasil penelitian/ kajiannya">Terdapat sarana/ kegiatan yang memfasilitasi dosen untuk menyampaikan/ menyebarluaskan pendapat atau hasil penelitian/ kajiannya</option>
                                <option value="Jumlah/ luas kelas cukup memadai dibanding dengan jumlah mahasiswa yang ada. ">Jumlah/ luas kelas cukup memadai dibanding dengan jumlah mahasiswa yang ada. </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mata Kuliah: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Semester: </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nilai: </label>
                            <select class="form-control" name="nilai">
                                <option>Pilihan</option>
                                <option value="sangat_baik">Sangat Baik</option>
                                <option value="baik">Baik</option>
                                <option value="cukup">Cukup</option>
                                <option value="kurang">Kurang</option>
                                <option value="sangat_kurang">Sangat Kurang</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-primary">Simpan</button>
                            <button class="btn btn-default">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection