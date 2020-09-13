<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>websekolah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('css/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome-5/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/jquery.printElement.js') }}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('home')  }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P D</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Penilaian</b> Dosen</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url(Auth::user()->user_img) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ url(Auth::user()->user_img) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->level }}
                  <small>Join since {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
<!--               <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('penguna/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('logout') }}" class="btn btn-default btn-flat" >Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url(Auth::user()->user_img) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU </li>
        <?php if(Auth::user()->level == 'admin') { ?>
          <li class="treeview">
            <a href="{{ url('/') }}">
                <i class="fa fa-users" aria-hidden="true"></i> <span> Dashboard </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

          </li> 
          <li class="treeview">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span> Data Dosen </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('data_dosen') }}"><i class="fa fa-list-alt"></i> Daftar</a></li>
            </ul>
          </li> 
          <li class="treeview">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Pendidikan </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('riwayat_pendidikan') }}"><i class="fa fa-list-alt"></i> Riwayat Pendidikan</a></li>
            </ul>
          </li> 
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Mengajar </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('riwayat_mengajar') }}"><i class="fa fa-list-alt"></i> Riwayat Mengajar</a></li>
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span>Karya Tulis </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('karya_tulis') }}"><i class="fa fa-list-alt"></i> Riwayat Mengajar</a></li>
            </ul>
          </li>     
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Riwayat Penelitian </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('riwayat_penelitian') }}"><i class="fa fa-list-alt"></i> Riwayat Penelitian</a></li>
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Pelatihan </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('pelatihan') }}"><i class="fa fa-list-alt"></i> Daftar Pelatihan</a></li>
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Penghargaan </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('penghargaan') }}"><i class="fa fa-list-alt"></i> Daftar Penghargaan</a></li>
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
                <i class="fa fa-history" aria-hidden="true"></i> <span> Jurnal </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('jurnal') }}"><i class="fa fa-list-alt"></i> Daftar Jurnal</a></li>
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Penilaian Kuisioner </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('perankingan') }}"><i class="fa fa-list-alt"></i> Perangkingan </a></li>
                <li><a href="{{ url('kuisioner_mahasiswa') }}"><i class="fa fa-list-alt"></i> Kuisioner Mahasiswa </a></li>
                <li><a href="{{ url('kuisioner_dosen') }}"><i class="fa fa-list-alt"></i> Kuisioner Dosen </a></li>
                <li><a href="{{ url('kuisioner_atasan') }}"><i class="fa fa-list-alt"></i> Kuisioner Atasan </a></li>
            </ul>
          </li>                                                                
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Daftar Nilai Kuisioner </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('daftar_nilai_kuisioner') }}"><i class="fa fa-list-alt"></i> Penilaian Kuisioner </a></li>
            </ul>
          </li>                                                                
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Report </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('riwayat_penelitian') }}"><i class="fa fa-list-alt"></i> Report </a></li>
                <li><a href="{{ url('element_penilaian') }}"><i class="fa fa-list-alt"></i> Element Penilaian</a></li>
            </ul>
          </li>                                                                
          <li class="treeview">
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> <span>Konfigurasi FrontEnd</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                {{-- <li><a href="{{ url('logo_header') }}"><i class="fa fa-list-alt"></i> Logo</a></li>   --}}
                <li class="active"><a href="{{ url('penguna') }}"><i class="fa fa-list-alt"></i> Daftar Penguna</a></li>
                {{-- <li class=""><a href="{{ url('ruang_kelas') }}"><i class="fa fa-list-alt"></i> Daftar Ruang Kelas</a></li> --}}
                <li><a href="{{ url('penguna/create') }}"><i class="fa fa-plus-circle"></i> Buat Penguna baru</a></li>           
            </ul>
          </li>         
        <?php } else if (Auth::user()->level == 'mahasiswa') { ?>
          <li class="treeview">
            <a href="{{ url('/') }}">
                <i class="fa fa-users" aria-hidden="true"></i> <span> Dashboard </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

          </li>
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Penilaian Kuisioner </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('pilih_dosen') }}"><i class="fa fa-list-alt"></i> Kuisioner </a></li>
            </ul>
          </li>  
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Daftar Nilai Kuisioner </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('daftar_nilai_kuisioner') }}"><i class="fa fa-list-alt"></i> Penilaian Kuisioner </a></li>
            </ul>
          </li>                                                                
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-question" aria-hidden="true"></i> <span> Report </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('riwayat_penelitian') }}"><i class="fa fa-list-alt"></i> Report </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span> Data Dosen </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('data_dosen') }}"><i class="fa fa-list-alt"></i> Daftar</a></li>
            </ul>
          </li> 
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Room
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    @if(session('pusing'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Rejected!</h4>
        {{ session('pusing') }}
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        {{-- this page admin --}}
        <?php if(Auth::user()->level == 'admin') { ?>
          <!-- this section daftar penguna register page -->
            @yield('daftar_pendidikan')
            @yield('add_riwayat_pendidikan')
            @yield('edit_riwayat_pendidikan')
            @yield('riwayat_mengajar')
            @yield('add_mengajar')
            @yield('edit_riwayat_mengajar')
            @yield('daftar_penelitian')
            @yield('add_riwayat_penelitian')
            @yield('edit_riwayat_penelitian')
            @yield('daftar-users')
            @yield('add_users')
            @yield('edit_user')
            @yield('data_dosen')
            @yield('biodata')
            @yield('data_penilaian')
            @yield('tambah_penilaian')
            @yield('pelatihan')
            @yield('add_pelatihan')
            @yield('edit_penilaian')
            @yield('jurnal')
            @yield('add_jurnal')
            @yield('edit_jurnal')
            @yield('karya_tulis')
            @yield('add_karya_tulis')
            @yield('edit_karya_tulis')
            @yield('penghargaan')
            @yield('edit_penghargaan')
            @yield('add_dosen')
            @yield('edit_dosen')
            @yield('kuisioner_mahasiswa')
            @yield('kuisioner_dosen')
            @yield('daftar_nilai_kuisioner')
            @yield('penilaian_kuisioner')
            @yield('add_perangkingan')
            @yield('atasan')
            @yield('element_penilaian')
          <!-- end section daftar penguna -->
        <?php } else if (Auth::user()->level == 'mahasiswa') { ?>
            @yield('kuisioner')
            
        <?php } ?>
        {{-- end page admin --}}
    </section>
    
    <!-- /.content -->
    {{-- this section alert --}}
    @if(session('pesan'))
    <div class="position-alert">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Pesan</h4>
            {{ session('pesan') }}
        </div>
    </div>
    @endif
    {{-- end section alert --}}
  </div>

  {{-- this section loading  --}}
  <div class="loading-bar">
      <div class="loader"></div>
  </div>
  {{-- end section loading --}}
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a>Web Sekolah</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('css/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('css/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('css/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('css/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('css/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('css/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('css/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('css/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('css/dist/js/demo.js') }}"></script>
    {{-- this editor text area --}}
    <script src="{{ asset('css/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- this datatables JS -->
    <script src="{{ asset('css/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>   
    <script>
        $.widget.bridge('uibutton', $.ui.button);
        $(function() {
          $('#tabel').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
          });
  
          CKEDITOR.replace('editor');
          $('.textarea').wysihtml5();
        });
  
        var url       =     '{{ url('') }}';
        var token     =     '{{ csrf_token('') }}';
      </script> 
</body>
</html>
