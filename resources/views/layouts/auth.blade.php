<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quixone | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
</head>

<body class="hold-transition @yield('name')">
    <div class="login-box">
          <div class="login-logo">
            <a href="./"><b>Quix</b>one</a>
          </div>
          <!-- /.login-logo -->
@yield('content')

</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
@yield('scripts')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
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

</body>
</html>
