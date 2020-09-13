@extends('home')
@section('add_karya_tulis')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Karya Tulis</h3>
        </div>

        <form action="{{ url('karya_tulis') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" name="penulisan" placeholder="Pelatihan" required="required">
                        </div>
                        <div class="form-group">
                            <label>Penulis kedua</label>
                            <input type="text" class="form-control" name="penulis_kedua" placeholder="Lembaga" required="required">
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama Penerbit</label>
                            <input type="text" class="form-control" name="nama_penerbit" placeholder="Nama Penerbit" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" placeholder="Tahun" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kota/Negara</label>
                            <input type="text" class="form-control" name="kota_negara" placeholder="Posisi" required="required">
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
                <a href="{{ url('karya_tulis') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div> 
@endsection