@extends('home')
@section('add_riwayat_penelitian')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Riwayat Penelitian</h3>
        </div>

        <form action="{{ url('riwayat_penelitian') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Penelitian</label>
                            <input type="text" class="form-control" name="judul_penelitian" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Bidang Ilmu</label>
                            <input type="text" class="form-control" name="bidang_ilmu" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" placeholder="" required="required">
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
                <a href="{{ url('riwayat_pendidikan') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection