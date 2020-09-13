@extends('home')
@section('edit_dosen')
<div class="add-users">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Dosen {{ $edit_user->name }}</h3>
        </div>
        <form action="{{ url('penguna/'.$edit_user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $edit_user->name }}" placeholder="Nama..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $edit_user->email }}" placeholder="Email..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password...">
                        </div>
                        <div class="form-group">
                            <label>Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil" id="file_sumber">
                        </div>
                        <div class="preview-profil">
                                <img id="preview" src="{{ url($edit_user->user_img) }}">
                        </div> 
                        {{-- <div class="form-group">
                                <label>Ruang Kelas</label>
                                <select class="form-control" name="ruang_kelas">
                                    <option selected value="{{ $edit_user->ruang_kelas }}">{{ $edit_user->ruang_kelas }}</option>
                                    @if(!empty($ruang_kelas))
                                        @foreach ($ruang_kelas as $daftar)
                                            <option value="{{ $daftar->kelas }}">{{ $daftar->kelas }}</option>
                                        @endforeach
                                    @endif
                                </select>
                        </div>                                                           --}}
                        <div class="form-group">
                            <label>Level Akses</label>
                            <select class="form-control" name="level" required="required">
                                <option value="{{ $edit_user->level }}">Pilih edit</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required="required">
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="jurusan" required="required">
                                <option value="{{ $edit_user->jurusan }}">Pilih edit</option>
                                <option value="informatika">Informatika</option>
                                <option value="sipil">Sipil</option>
                                <option value="informatika">Informatika</option>
                                <option value="arsitek">Arsitektur</option>
                                <option value="elektro">Elektro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>NIM / NIP</label>
                                <input type="number" class="form-control" name="nomor_induk" value="{{ $edit_user->nomor_induk }}" placeholder="1116009" required="required">
                            </div>
                            <div class="form-group">
                                <label>Gelar</label>
                                <input type="text" class="form-control" name="gelar" value="{{ $edit_user->gelar }}" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" value="{{ $edit_user->pendidikan }}" placeholder="" required="required">
                            </div>
                            {{-- <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="nomor_telpon" value="{{ $edit_user->nomor_telepon }}" placeholder="6289655088505" required="required">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" style="height: 290px;">
                                    
                                </textarea>
                            </div>                             --}}
                    </div>
                </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Perbaharui</button>
            <a href="{{ url('penguna') }}" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#file_sumber').change(function() {
        readFile(this);
    });
    $('.preview-profil').css('display','block');
    function readFile(input) {
        if(input.files && input.files[0]) {
            var reader      =   new FileReader();
            $('.preview-profil').css('display','block');
            reader.onload   =   function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>  
@endsection