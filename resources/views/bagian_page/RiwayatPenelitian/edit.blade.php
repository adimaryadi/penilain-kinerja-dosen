@extends('home')
@section('edit_riwayat_penelitian')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Penelitian</h3>
        </div>

        <form action="{{ url('riwayat_penelitian',$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Penelitian</label>
                            <input type="text" class="form-control" name="judul_penelitian" value="{{ $edit->judul_penelitian }}" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Bidang Ilmu</label>
                            <input type="text" class="form-control" name="bidang_ilmu" value="{{ $edit->bidang_ilmu }}" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga" value="{{ $edit->lembaga }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{ $edit->tahun }}" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Riwayat Dosen</label>
                            <select class="form-control" name="riwayat_dosen" id="">
                                <option value="{{ $edit->id_dosen }}">Pilih edit</option>
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
                <a href="{{ url('riwayat_penelitian') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection