@extends('home')
@section('edit_karya_tulis')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Karya Tulis</h3>
        </div>

        <form action="{{ url('karya_tulis/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" name="penulisan" value="{{ $edit->penulis }}" placeholder="Pelatihan" required="required">
                        </div>
                        <div class="form-group">
                            <label>Penulis kedua</label>
                            <input type="text" class="form-control" name="penulis_kedua" value="{{ $edit->penulis_kedua }}" placeholder="Lembaga" required="required">
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" value="{{ $edit->judul_buku }}" placeholder="Judul Buku" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama Penerbit</label>
                            <input type="text" class="form-control" name="nama_penerbit" value="{{ $edit->nama_penerbit }}" placeholder="Nama Penerbit" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{ $edit->tahun }}" placeholder="Tahun" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kota/Negara</label>
                            <input type="text" class="form-control" name="kota_negara" value="{{ $edit->kota_negara }}" placeholder="Posisi" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Dosen</label>
                            <select name="id_dosen" id="" class="form-control">
                                <option value="{{ $edit->id_dosen }}">Perbaharui</option>
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
                <a href="{{ url('karya_tulis') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div> 
@endsection