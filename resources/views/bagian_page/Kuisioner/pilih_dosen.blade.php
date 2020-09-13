@extends('home')
@section('kuisioner')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Pilih Dosen</h3>
        </div>
        <div class="box-body">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pilih Dosen</label>
                            <select name="dosen_pilih" class="form-control">
                                @if (!empty($data_dosen))
                                    @foreach ($data_dosen as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Pilih</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection