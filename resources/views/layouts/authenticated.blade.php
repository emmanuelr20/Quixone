<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Quixone @yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#game_type">Play Now</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('about') }}" class="nav-link">About Us</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
        @if (auth()->check())
        <li class="nav-item dropdown">
              <div class="info-box-content">
                  <span class=""><i class="fa fa-money"></i> {{ (int)auth()->user()->wallet }}.00</span>
              </div>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
       <img src="{{ asset('dist/img/Logo.png') }}" alt="Quixone" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">Quixone</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" data-target="#info{{ strtolower(auth()->user()->username) }}" data-toggle="modal"><small>{{ strtolower(auth()->user()->username) }}</small></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/user/dashboard" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @if(auth()->user()->quizzes()->where('quiz_status_id', 1)->exists())
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#unfinishedQuiz" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-pencil"></i>
                  <span class="nav-link-text">Resume Unfinished Quiz</span>
                </a>
                  <ul class="sidenav-second-level collapse" id="unfinishedQuiz">
                    @foreach(auth()->user()->quizzes()->where('quiz_status_id', 1)->get() as $quiz)
                      @if($quiz->questions->count() >= $quiz->current_question + 1)
                      <li>
                        <a href="{{ route('resume_quiz', $quiz->id) }}"><small>started: </small>{{$quiz->created_at->diffForHumans()}}</a>
                      </li>
                      @endif
                    @endforeach
                  </ul>
              </li>
            @endif
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#game_type">
                <i class="fa fa-gamepad nav-icon"></i>
                <p>Play Now</p>
              </a>
            </li>
            {{--  <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-money nav-icon"></i>
                <p>Deposit Now</p>
              </a>
            </li>  --}}
            <li class="nav-item">
              <a href="#" class="nav-link"  data-toggle="modal" data-target="#referral">
              <i class="nav-icon fa fa-share"></i>
              <p>
                Refer a Friend
              </p>
            </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#testimonies">
                <i class="nav-icon fa fa-pencil"></i>
                <p>
                  Add Testimonies
                </p>
              </a>
            </li>
            @if (auth()->user()->is_admin)
              <li class="nav-item">
                <a href="{{ route('add_question') }}" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>
                    Add Question
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" data-target="#add_subject" data-toggle="modal">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>
                    Add Subject
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unpaid_winners') }}" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>
                    Unpaid Winner
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paid_winners') }}" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>
                    Paid Winner
                  </p>
                </a>
              </li>
            @endif
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#logout">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

        @yield('content')

    <!-- Main Footer -->
<footer class="main-footer">
  <!-- Default to the left -->
  <strong>Copyright &copy; 2018 <a href="{{ route('about') }}">Quixone</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- Modals -->

@include('partials.modals.infocard', ['user' => auth()->user(), 'id' => auth()->user()->username])
@include('partials.modals.testimonies')
@include('partials.modals.referral')
@include('partials.modals.select_quiz')
@include('partials.modals.logout')
@include('partials.modals.update_account')

@if (auth()->user()->is_admin)
    @include('partials.modals.add_subject')
@endif


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
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