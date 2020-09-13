@extends('home')
@section('tambah_penilaian')
<div class="tambah-fasilitas-sekolah">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Penilaian</h3>
        </div>

        <form action="{{ url('data_penilaian') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Element Penilaian</label>
                            <input type="text" name="element_penilaian" class="form-control" placeholder="Element Penilaian" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" class="form-control">
                                <option value="informatika">Informatika</option>
                                <option value="sipil">Sipil</option>
                                <option value="elektro">Elektro</option>
                                <option value="arsitektur">Arsitektur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Matkul</label>
                            <select name="matkul" class="form-control">
                                <?php for ($i=1; $i < 8; $i++) { ?>
                                    <option value="">Semester {{ $i }}</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dosen</label>
                            <select class="form-control" name="id_dosen">
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
                <a href="{{ url('data_penilaian') }}" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div> 
@endsection