@extends('home')
@section('karya_tulis')
<div class="ruang-kelas">
    <div class="box box-primary">

        <div class="box-header">
            <h3 class="box-title">Karya Tulis</h3>
            <div class="add-data">
                <a href="{{ url('karya_tulis/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a href="{{ url('ruang_kelas/create') }}">
            </div>
        </div>

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Penulis</th>
                        <th>Judul Buku</th>
                        <th>Nama Penerbit</th>
                        <th>Tahun</th>
                        <th>Kota Negara</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->nama_penerbit }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->kota_negara }}</td>
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
        return window.location.href     =    url+ '/karya_tulis/'+id+'/edit';
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
                    url: url+ "/karya_tulis/"+id,
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
                                return window.location.href     =   url+ '/karya_tulis';
                            } else {
                                return window.location.href     =   url+ '/karya_tulis';
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