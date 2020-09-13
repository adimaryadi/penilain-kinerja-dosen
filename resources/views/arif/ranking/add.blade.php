@extends('home')
@section('add_perangkingan')
    <div class="add-perankingan">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tambah Perankingan</h3>
            </div>

            <form action="{{ url('') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penelitian</label>
                                <select name="penelitian" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pengabdian</label>
                                <select name="pengabdian" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pembelajaran</label>
                                <select name="pembelajaran" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Absensi</label>
                                <select name="absensi" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jurnal</label>
                                <select name="jurnal" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Riwayat Pendidikan</label>
                                <select name="riwayat_pendidikan" class="form-control">
                                    <option value="sangat_baik">Sangat Baik</option>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="sangat_kurang">Sangat Kurang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('perankingan') }}" class="btn btn-outline-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection