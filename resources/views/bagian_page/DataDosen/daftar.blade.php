@extends('home')
@section('data_dosen')
<div class="fasilitas_sekolah">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Dosen</h3>
            <div class="add-data">
                <a href="{{ url('data_dosen/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped" id="tabel">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Gelar</th>
                        <th>Pendidikan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data_dosen as $item)
                        <tr>
                            <td><a href="{{ url('biodata/?nip='.$item->id) }}">{{ $item->nomor_induk }}</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gelar }}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>
                                <div class="pilihan">
                                    <i onclick="Edit('{{ $item->id }}')" class="fa fa-edit"></i>
                                    <i onclick="Hapus('{{ $item->id }}')" class="fa fa-eraser"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Gelar</th>
                        <th>Pendidikan</th>
                    </tr>						
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Edit(id) {
        return window.location.href 	= 	 url+ '/data_dosen/'+id+'/edit';
    }

    function Hapus(id) {
        swal({
          title: "Apakah Anda Yakin ?",
          text: "Fasilitas ini akan di hapus!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $('.loading-bar').slideDown("slow");
            $.ajax({
                url: url+'/data_dosen/'+id,
                type: 'POST',
                data: {
                    _method: "DELETE",
                    _token:  token
                },
            })
            .done(function(data) {
                console.log(data);
                swal("Terhapus !", {
                  icon: "success",
                });			  
                setTimeout(() => {
                    return window.location.href 	= 	 url+ '/data_dosen';
                },3000);  	
                $('.loading-bar').slideUp("slow");
            })
            .fail(function(pusing) {
                console.log(pusing);
                swal({
                    title: "Gagal Menghapus",
                    icon:  "error"
                });
                $('.loading-bar').slideUp("slow");
            });
            
          } else {
            swal("Dibatalkan!", {
                icon: "info"
            });
          }
        });			
    }
</script>
@endsection