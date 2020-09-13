@extends('home')
@section('daftar-users')
	<div class="section-daftar-penguna">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar penguna</h3>
              <div class="upload-data">
                   <div class="form-group">
                      <label>Upload user dari excel</label>
                      <input type="file" onchange="Upload_data(this)" id="upload_excel" name="upload_data" class="form-control">
                   </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Nama</th>
	                  <th>Email</th>
	                  <th>Status</th>
	                  <th>Kelas</th>
	                  <th>Nomor induk</th>
	                  <th>Pilihan</th>
	                </tr>
                </thead>
                <tbody>
                  @if(!empty($data_penguna))
                    @foreach($data_penguna as $penguna)
                      <tr>
                          <td>{{ $penguna->name }}</td>
                          <td>{{ $penguna->email }}</td>
                          <td>{{ $penguna->status }}</td>
                          <td>{{ $penguna->ruang_kelas }}</td>
                          <td>{{ $penguna->nomor_induk }}</td>
                          <td>
                            <div class="pilihan">
                              <i onclick="Edit('{{ $penguna->id }}')" class="fa fa-edit"></i>
                              <i onclick="Hapus('{{ $penguna->id }}')" class="fa fa-eraser" aria-hidden="true" style="color: tomato;"></i>
                            </div>
                          </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
	                <tr>
	                  <th>Nama</th>
	                  <th>Email</th>
                    <th>Status</th>
                    <th>Kelas</th>
	                  <th>Nomor induk</th>
	                  <th>Pilihan</th>
	                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>		
  </div>
  <script type="text/javascript">
    function Edit(id) {
      return location.href    =   url+'/penguna/'+id+'/edit';
    }

    function Hapus(id) {
      
      swal({
        title:      "apakah yakin penguna ini akan di hapus",
        icon:       "warning",
        buttons:    true,
        dangerMode: true
      })
      .then((akandihapus) => {
        if(akandihapus) {
          $('.loading-bar').slideDown("slow");
          $.ajax({
            type: "POST",
            url: url+'/penguna/'+ id,
            data: {
              _token:  token,
              _method: 'DELETE'
            },
            success: function (response) {
              $('.loading-bar').slideUp("slow");
              swal({
                title: "Penguna Sudah Terhapus",
                icon:  "success"
              });
              setTimeout(() => {
                return window.location.href    =  url+'/penguna';
              }, 2000);
            },error: function(pusing) {
              console.log(pusing);
              swal({
                title: "Gagal",
                icon:  "warning"
              });
              setTimeout(() => {
                return location.reload();
              }, 2000);
            }
          });
        } else {
          swal("dibatalkan");
        }
      });
    }

    function Upload_data(sender) {
       // var file_excel         =       $('#upload_excel').prop('files');

       var validExct          =       new Array(".xlsx",".xls");
       var fileExt            =       sender.value;
       fileExt                =       fileExt.substring(fileExt.lastIndexOf('.'));

       if(validExct.indexOf(fileExt) < 0) {
          swal({
            title: "Tidak bisa di upload format harus excel",
            icon:  "error"
          });
          return false;
       } else {
          var form        =     new FormData();
          form.append('file_data', $('#upload_excel').prop('files')[0]);

          $('.loading-bar').slideDown("slow");
          $.ajax({
            url: url+'/upload_excel_users',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            dataType : 'JSON',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
          })
          .done(function(data) {
            $('.loading-bar').slideUp("slow");
            swal({
              title: "Terupload user",
              icon:  "success",
              buttons: true,
              dangerMode: true,
            })
            .then((value) => {
               if (value) {
                  return window.location.href     =   url+ '/penguna';
               } else {
                  return window.location.href     =   url+ '/penguna';
               }
            });
          })
          .fail(function(pusing) {
            $('.loading-bar').slideUp("slow");
            swal({
              title: "Tidak Bisa di upload",
              icon:  "error",
              text:   JSON.stringify(pusing.responseText)
            });
            console.log(pusing);
          });
       }
    }
  </script>
@endsection