@extends('home')
@section('daftar_nilai_kuisioner')
    <div class="daftar-nilai">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Daftar Nilai Kuisioner</h3>
            </div>
            <div class="box-body">
                <table id="tabel" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kuisioner</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection