@extends('home')
@section('penilaian_kuisioner')
    <div class="penilaian-kuisioner">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Perankingan</h3>
                <div class="add-data">
                    <a class="btn btn-primary" href="{{ url('perankingan/create') }}"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>

            <div class="box-body">
                <table id="tabel" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Penelitian</th>
                            <th>Pengabdian</th>
                            <th>Pembelajaran</th>
                            <th>Absensi</th>
                            <th>Jurnal</th>
                            <th>Riwayat Pendidikan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection