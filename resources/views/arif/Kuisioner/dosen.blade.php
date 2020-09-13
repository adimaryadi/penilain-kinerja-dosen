@extends('home')
@section('kuisioner_dosen')
    <div class="kuisioner_dosen">
        <div class="kuisioner">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Kuisioner Dosen</h3>
                </div>
    
                <form action="{{ url('daftar_nilai_kuisioner') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama: </label>
                                    <select class="form-control" name="id_dosen">
                                        @if(!empty($dosen))
                                            @foreach ($dosen as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kuisioner: </label>
                                    <select class="form-control" name="kuisioner">
                                        <option>Pilihan</option>
                                        <option value="Kesungguhan dalam mempersiapkan perkuliahan">Kesungguhan dalam mempersiapkan perkuliahan</option>
                                        <option value="Keteraturan dan ketertiban penyelenggaraan perkuliahan">Keteraturan dan ketertiban penyelenggaraan perkuliahan</option>
                                        <option value="Kemampuan mengelola kelas">Kemampuan mengelola kelas</option>
                                        <option value="Penguasaan bidang keahlian yang menjadi tugas pokoknya">Penguasaan bidang keahlian yang menjadi tugas pokoknya</option>
                                        <option value="Keluasan wawasan keilmuan">Keluasan wawasan keilmuan</option>
                                        <option value="Kemampuan menunjukkan keterkaitan antara bidang keahlian yang diajarkan dengan konteks kehidupan">Kemampuan menunjukkan keterkaitan antara bidang keahlian yang diajarkan dengan konteks kehidupan</option>
                                        <option value="Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan">Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nilai: </label>
                                    <select class="form-control" name="nilai">
                                        <option>Pilihan</option>
                                        <option value="sangat_baik">Sangat Baik</option>
                                        <option value="baik">Baik</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="kurang">Kurang</option>
                                        <option value="sangat_kurang">Sangat Kurang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary">Simpan</button>
                                    <button class="btn btn-default">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection