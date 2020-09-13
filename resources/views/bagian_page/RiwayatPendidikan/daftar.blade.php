@extends('home')
@section('daftar_pendidikan')
<div class="ruang-kelas">
    <div class="box box-primary">

        <div class="box-header">
            <h3 class="box-title">Pendidikan</h3>
            <div class="add-data">
                <a href="{{ url('riwayat_pendidikan/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a href="{{ url('ruang_kelas/create') }}">
            </div>
        </div>

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Perguruan Tinggi</th>
                        <th>Gelar Akademik</th>
                        <th>Tanggal Izasah</th>
                        <th>dosen</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->perguruan_tinggi }}</td>
                            <td>{{ $item->gelar_akademik }}</td>
                            <td>{{ $item->tanggal_izasah }}</td>
                            <td>{{ $item->jenjang }}</td>
                            <td>
                                <div class="pilihan">
                                    <i onclick="Edit('{{ $item->id }}')" class="fa fa-edit"></i>
                                    <i onclick="Hapus('{{ $item->id }}')" class="fa fa-eraser" style="color: tomato;"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>Perguruan Tinggi</th>
                        <th>Gelar Akademik</th>
                        <th>Tanggal Izasah</th>
                        <th>dosen</th>
                        <th>Pilihan</th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Edit(id) {
        return window.location.href     =    url+ '/riwayat_pendidikan/'+id+'/edit';
    }

    function Hapus(id) {
        swal({
            title: "Apakah Anda Yakin ?",
            text:  "data ini akan di hapus",
            icon:  "warning",
            buttons: true,
            dangerMode: true
        })
        .then((dihapus) => {
            if(dihapus) {
                $('.loading-bar').slideDown("slow");
                $.ajax({
                    type: "POST",
                    url: url+ "/riwayat_pendidikan/"+id,
                    data: {
                        _method: "DELETE",
                        _token:  token
                    },
                    success: function (response) {
                        $('.loading-bar').slideUp("slow");
                        swal({
                            title: "Terhapus",
                            icon:  "success",
                            buttons: true,
                            dangerMode: true
                        })
                        .then((berhasil) => {
                            if(berhasil) {
                                return window.location.href     =   url+ '/riwayat_pendidikan';
                            } else {
                                return window.location.href     =   url+ '/riwayat_pendidikan';
                            }
                        });
                    }, pusing: function (pusing) {
                        swal({
                            title: "Pusing",
                            icon:  "error"
                        });
                        console.log(pusing);
                    }
                });
            } else {
                swal({
                    title: "dibatalkan",
                    icon:  "info"
                });
            }
        });
    }
</script>  
@endsection