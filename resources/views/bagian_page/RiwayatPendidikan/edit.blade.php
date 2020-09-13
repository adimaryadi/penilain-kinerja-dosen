@extends('home')
@section('edit_riwayat_pendidikan')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Riwayat Pendidikan</h3>
        </div>

        <form action="{{ url('riwayat_pendidikan/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Perguruan Tinggi</label>
                            <input type="text" class="form-control" name="perguruan_tinggi" value="{{ $edit->perguruan_tinggi }}" placeholder="Perguruan Tinggi" required="required">
                        </div>
                        <div class="form-group">
                            <label>Gelar Akademik</label>
                            <input type="text" class="form-control" name="gelar_akademik" value="{{ $edit->gelar_akademik }}" placeholder="Gelar Akademik" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Izasah</label>
                            <input type="text" class="form-control" name="tanggal_izasah" value="{{ $edit->tanggal_izasah }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Jenjang</label>
                            <input type="text" class="form-control" name="jenjang" value="{{ $edit->jenjang }}" placeholder="Jenjang" required="required">
                        </div>
                        <div class="form-group">
                            <label>Riwayat Dosen</label>
                            <select class="form-control" name="riwayat_dosen" id="">
                                <option value="{{ $edit->id_dosen }}">pilih perbaharui</option>
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
                <a href="{{ url('riwayat_pendidikan') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection