@extends('home')
@section('edit_penghargaan')
<div class="tambah-persyaratan-calon-ppdb">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Penghargaan</h3>
        </div>

        <form action="{{ url('penghargaan/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Penghargaan</label>
                            <input type="text" class="form-control" name="nama_penghargaan" value="{{ $edit->nama_penghargaan }}" placeholder="Penghargaan" required="required">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="kategori" value="{{ $edit->kategori }}" placeholder="Kategori" required="required">
                        </div>
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" name="lembaga" value="{{ $edit->lembaga }}" placeholder="Lembaga" required="required">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" value="{{ $edit->tahun }}" placeholder="Tahun" required="required">
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
                <a href="{{ url('penghargaan') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div> 
@endsection