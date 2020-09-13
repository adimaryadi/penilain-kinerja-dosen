@extends('home')
@section('add_mengajar')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Riwayat Mengajar</h3>
        </div>

        <form action="{{ url('riwayat_mengajar') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" name="semester" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control" name="kode_mata_kuliah" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control" name="nama_mata_kuliah" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kode Kelas</label>
                            <input type="text" class="form-control" name="kode_kelas" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Perguruan Tinggi</label>
                            <input type="text" class="form-control" name="perguruan_tinggi" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Riwayat Dosen</label>
                            <select class="form-control" name="riwayat_dosen" id="">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('riwayat_mengajar') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection