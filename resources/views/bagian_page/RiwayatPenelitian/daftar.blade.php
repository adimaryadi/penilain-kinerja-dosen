@extends('home')
@section('daftar_penelitian')
<div class="ruang-kelas">
    <div class="box box-primary">

        <div class="box-header">
            <h3 class="box-title">Penelitian</h3>
            <div class="add-data">
                <a href="{{ url('riwayat_penelitian/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a href="{{ url('riwayat_penelitian/create') }}">
            </div>
        </div>

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Judul Penelitian</th>
                        <th>Bidang ilmu</th>
                        <th>Tanggal Izasah</th>
                        <th>Tahun</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->judul_penelitian }}</td>
                            <td>{{ $item->bidang_ilmu }}</td>
                            <td>{{ $item->lembaga }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                <div class="pilihan">
                                    <i onclick="Edit('{{ $item->id }}')" class="fa fa-edit"></i>
                                    <i onclick="Hapus('{{ $item->id }}')" class="fa fa-eraser" style="color: tomato;"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Edit(id) {
        return window.location.href     =    url+ '/riwayat_penelitian/'+id+'/edit';
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
                    url: url+ "/riwayat_penelitian/"+id,
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
                                return window.location.href     =   url+ '/riwayat_penelitian';
                            } else {
                                return window.location.href     =   url+ '/riwayat_penelitian';
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