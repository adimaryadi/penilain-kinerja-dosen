@extends('home')
@section('edit_penilaian')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Pelatihan</h3>
        </div>

        <form action="{{ url('pelatihan/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pelatihan</label>
                            <input type="text" class="form-control" name="pelatihan" value="{{ $edit->pelatihan }}" placeholder="Pelatihan" required="required">
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga" placeholder="Lembaga" value="{{ $edit->lembaga }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="{{ $edit->lokasi }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control" name="jenjang" placeholder="Level" value="{{ $edit->level }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Waktu</label>
                            <input type="text" class="form-control" name="waktu" placeholder="Waktu" value="{{ $edit->waktu }}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="{{ $edit->posisi }}" required="required">
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
                <a href="{{ url('pelatihan') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection