<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quixone | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <div class="container">
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link active">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('about') }}" class="nav-link">About</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      @if (auth()->check())
      <li class="nav-item dropdown">
            <div class="info-box-content">
                <span class=""><i class="fa fa-money"></i> {{ (int)auth()->user()->wallet }}.00</span>
            </div>
      </li>
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
            <i class="fa fa-angle-down  "></i>
        </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @if (auth()->check())
                <a href="{{ route('dashboard') }}" class="dropdown-item">
                    <i class="fa fa-dashboard mr-2"></i> Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('deposit') }}" class="dropdown-item">
                    <i class="fa fa-money mr-2"></i>Make Deposit
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-target="#game_type" data-toggle="modal">
                    <i class="fa fa-gamepad mr-2"></i>Play Now
                </a>
                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" data-target="#logout" data-toggle="modal">
                <i class="fa fa-power-off mr-2"></i> Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="dropdown-item">
                    <i class="fa fa-envelope mr-2"></i> Login
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item">
                    <i class="fa fa-users mr-2"></i> Register
                </a>
            @endif
        </div>
        </li>

    </ul>
  </div>
  </nav>
  <!-- /.navbar -->

  @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="footer">
    <div class="container">
        <strong>Copyright &copy; 2018 <a href="/">Quixone</a>.</strong> All rights reserved.
    </div>
  </footer>

    @if (auth()->check())
        @include('partials.modals.testimonies')
        @include('partials.modals.referral')
        @include('partials.modals.select_quiz')
        @include('partials.modals.logout')
    @endif
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script> -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
<script type="text/javascript">
  toastr.options.preventDuplicates = true;
    @if (count($errors) > 0)
            var err_msg = ""
            err_msg += "<ul>"
                @foreach ($errors->all() as $error)
                    err_msg += "<li>{{ $error }}</li>"
                @endforeach
            err_msg += "</ul>"
        toastr.error(err_msg);
    @endif
    @if (session('error'))
        toastr.error("{{session('error')}}");
    @endif
    @if (session('success'))
        toastr.success("{{session('success')}}");
    @endif

    @if (session('info'))
        toastr.info("{{session('info')}}");
    @endif
    </script>
    @yield('scripts')
</body>
</html>