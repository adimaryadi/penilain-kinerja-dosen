@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Penilaian</b> Dosen</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login For Administrator</p>
  
      <form action="{{ route('login') }}" method="POST">
        <!-- this csrf token -->
        @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          @if(session('pesan'))
            <span class="invalid-feedback" role="alert" style="position: relative;top: 8px;">
                <strong>{{ session('pesan') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required="required">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <a href="{{ url('register') }}">Register</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
  
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection
