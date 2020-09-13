@extends('home')
@section('edit_riwayat_mengajar')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Riwayat Mengajar</h3>
        </div>

        <form action="{{ url('riwayat_mengajar',$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" value="{{ $edit->semester }}" name="semester" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control" value="{{ $edit->kode_mata_kuliah }}" name="kode_mata_kuliah" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control" value="{{ $edit->nama_mata_kuliah }}" name="nama_mata_kuliah" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kode Kelas</label>
                            <input type="text" class="form-control" value="{{ $edit->kode_kelas }}" name="kode_kelas" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Perguruan Tinggi</label>
                            <input type="text" class="form-control" value="{{ $edit->perguruan_tinggi }}" name="perguruan_tinggi" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Riwayat Dosen</label>
                            <select class="form-control" name="riwayat_dosen" id="">
                                <option value="{{ $edit->id_dosen }}">Pilih Edit</option>
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