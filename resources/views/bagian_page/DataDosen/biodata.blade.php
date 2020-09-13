@extends('home')
@section('biodata')
    <div class="fasilitas_sekolah">
        <div class="box">
            <div class="row">
                <div class="col-md-4">
                    <div class="img-foto">
                        <img src="{{ url($users->user_img) }}" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <table class="biodata">
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $users->name }}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>: {{ $users->nomor_induk }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $users->status }}</td>
                            </tr>
                            <tr>
                                <td>Dosen</td>
                                <td>: {{ $users->jurusan }}</td>
                            </tr>
                            <tr>
                                <td>pendidikan</td>
                                <td>: {{ $users->pendidikan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                          <!-- Custom Tabs -->
                          <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Riwayat Pendidikan</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Riwayat Mengajar</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Penelitian</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Karya Tulis</a></li>
                              <li><a href="#tab_5" data-toggle="tab">Pelatihan</a></li>
                              <li><a href="#tab_6" data-toggle="tab">Penghargaan</a></li>
                              <li><a href="#tab_7" data-toggle="tab">Jurnal</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <table class="table table-bordered table-striped" id="riwayat_pendidikan">
                                    <thead>
                                        <tr>
                                            <th>Perguruan tinggi</th>
                                            <th>Gelar akademik</th>
                                            <th>Tanggal Izasah</th>
                                            <th>jenjang</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @if(!empty($riwayat_pendidikan))
                                            @foreach ($riwayat_pendidikan as $item)
                                            <tr>
                                                <td>{{ $item->perguruan_tinggi }}</td>
                                                <td>{{ $item->gelar_akademik }}</td>
                                                <td>{{ $item->tanggal_izasah }}</td>
                                                <td>{{ $item->jenjang }}</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_2">
                                <table id="riwayat_penelitian" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kode Kelas</th>
                                            <th>Perguruan tinggi</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @if(!empty($riwayat_mengajar))
                                            @foreach ($riwayat_mengajar as $item)
                                            <tr>
                                                <td>{{ $item->semester }}</td>
                                                <td>{{ $item->kode_mata_kuliah }}</td>
                                                <td>{{ $item->nama_mata_kuliah }}</td>
                                                <td>{{ $item->kode_kelas }}</td>
                                                <td>{{ $item->perguruan_tinggi }}</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                    
                                    <tfoot>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kode Kelas</th>
                                            <th>Perguruan tinggi</th>
                                        </tr>
                                    </tfoot>
                    
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_3">
                                <table id="tabel" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>Judul Penelitian</th>
                                            <th>Bidang ilmu</th>
                                            <th>Tanggal Izasah</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @if(!empty($riwayat_penelitian))
                                            @foreach ($riwayat_penelitian as $item)
                                                <tr>
                                                    <td>{{ $item->judul_penelitian }}</td>
                                                    <td>{{ $item->bidang_ilmu }}</td>
                                                    <td>{{ $item->lembaga }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                    
                                    <tfoot>
                                        <tr>
                                            <th>Judul Penelitian</th>
                                            <th>Bidang ilmu</th>
                                            <th>Tanggal Izasah</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </tfoot>
                    
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_4">
                                <table id="karyawan_tulis" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Penulis</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Penerbit</th>
                                            <th>Tahun</th>
                                            <th>Kota Negara</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @if(!empty($karya_tulis))
                                            @foreach ($karya_tulis as $item)
                                                <tr>
                                                    <td>{{ $item->penulis }}</td>
                                                    <td>{{ $item->judul_buku }}</td>
                                                    <td>{{ $item->nama_penerbit }}</td>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>{{ $item->kota_negara }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_5">
                                <table id="penghargaan" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pelatihan</th>
                                            <th>Lembaga</th>
                                            <th>Lokasi</th>
                                            <th>Level</th>
                                            <th>Waktu</th>
                                            <th>Posisi</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        @if(!empty($pelatihan))
                                            @foreach ($pelatihan as $item)
                                                <tr>
                                                    <td>{{ $item->pelatihan }}</td>
                                                    <td>{{ $item->lembaga }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->level }}</td>
                                                    <td>{{ $item->waktu }}</td>
                                                    <td>{{ $item->posisi }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_6">
                                <table id="karya_tulis" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Penulis</th>
                                            <th>Penulis kedua</th>
                                            <th>Volume</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_7">
                                <table id="pelatihan" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Penghargaan</th>
                                            <th>Kategori</th>
                                            <th>Lembaga</th>
                                            <th>tahun</th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>

                                    </tbody>
                                </table>
                              </div>
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div>
                          <!-- nav-tabs-custom -->
                        </div>
                      </div>
                </div>
        </div>
    </div>
    <script>
        $(function() {
          $('#riwayat_pendidikan').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
          $('#riwayat_mengajar').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });

          $('#riwayat_penelitian').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
          $('#karyawan_tulis').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
          $('#pelatihan').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
          $('#penghargaan').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
          $('#karya_tulis').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          });
  
          CKEDITOR.replace('editor');
          $('.textarea').wysihtml5();
        });
    </script>
@endsection