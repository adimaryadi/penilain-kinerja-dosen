@extends('home')
@section('add_jurnal')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Jurnal</h3>
        </div>

        <form action="{{ url('jurnal') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" name="penulis" placeholder="Penulis" required="required">
                        </div>
                        <div class="form-group">
                            <label>Penulis Kedua</label>
                            <input type="text" class="form-control" name="penulis_kedua" placeholder="Penulis Kedua" required="required">
                        </div>
                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input type="text" class="form-control" name="judul_artikel" placeholder="Judul Artikel" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama Jurnal</label>
                            <input type="text" class="form-control" name="nama_jurnal" placeholder="Nama Jurnal" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="waktu" placeholder="tahun" required="required">
                        </div>
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="text" class="form-control" name="volume" placeholder="Volume" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Dosen</label>
                            <select name="id_dosen" id="" class="form-control">
                                @foreach ($data_dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('jurnal') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection