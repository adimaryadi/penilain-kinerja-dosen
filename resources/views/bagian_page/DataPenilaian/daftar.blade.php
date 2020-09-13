@extends('home')
@section('data_penilaian')
<div class="fasilitas_sekolah">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Penilaian</h3>
            <div class="add-data">
                <a href="{{ url('data_penilaian/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped" id="tabel">
                <thead>
                    <tr>
                        <th>Element penilaian</th>
                        <th>Skor</th>
                        <th>Sangat baik</th>
                        <th>Baik</th>
                        <th>Cukup</th>
                        <th>Kurang Baik</th>
                        <th>Sangat Kurang</th>
                        <th>pilihan</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->element_penilaian }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Edit(id) {
        return window.location.href 	= 	 url+ '/data_penilaian/'+id+'/edit';
    }

    function Hapus(id) {
        swal({
          title: "Apakah Anda Yakin ?",
          text: "data ini akan di hapus!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $('.loading-bar').slideDown("slow");
            $.ajax({
                url: url+'/data_penilaian/'+id,
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
                    return window.location.href 	= 	 url+ '/data_penilaian';
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