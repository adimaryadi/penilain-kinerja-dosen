@extends('home')
@section('pelatihan')
<div class="ruang-kelas">
    <div class="box box-primary">

        <div class="box-header">
            <h3 class="box-title">Pelatihan</h3>
            <div class="add-data">
                <a href="{{ url('pelatihan/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a href="{{ url('ruang_kelas/create') }}">
            </div>
        </div>

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Pelatihan</th>
                        <th>Lembaga</th>
                        <th>Lokasi</th>
                        <th>Level</th>
                        <th>Waktu</th>
                        <th>Posisi</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->pelatihan }}</td>
                            <td>{{ $item->lembaga }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->waktu }}</td>
                            <td>{{ $item->posisi }}</td>
                            <td>
                                <div class="pilihan">
                                    <i onclick="Edit('{{ $item->id }}')" class="fa fa-edit"></i>
                                    <i onclick="Hapus('{{ $item->id }}')" class="fa fa-eraser"></i>
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
        return window.location.href     =    url+ '/pelatihan/'+id+'/edit';
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
                    url: url+ "/pelatihan/"+id,
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
                                return window.location.href     =   url+ '/pelatihan';
                            } else {
                                return window.location.href     =   url+ '/pelatihan';
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