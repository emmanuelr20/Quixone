@extends('layouts.authenticated')
@section('title')
  Dashboard
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-list"></i></span>
                <a href="#" class="text-dark" data-toggle="modal" data-target="#game_type">
                  <div class="info-box-content">
                    <span class="info-box-text">Play Now</span>
                    <span class="info-box-number">Enter Competition</span>
                  </div>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-money"></i></span>
                <a class="text-dark" href="{{ route('deposit') }}" >
                  <div class="info-box-content">
                    <span class="info-box-text">Deposit Now</span>
                    <span class="info-box-number">fund wallet</span>
                  </div>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-gamepad"></i></span>
                <a href="#" class="text-dark" data-toggle="modal" data-target="#game_type">
                  <div class="info-box-content">
                    <span class="info-box-text">Active Game Type </span>
                    <span class="info-box-number">
                      @forelse($quiz_types as $quiz_type) 
                        {{ $quiz_type->title }} &nbsp;&nbsp;&nbsp;&nbsp;
                      @empty 
                        No quiz available 
                      @endforelse
                    </span>
                  </div>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Current Balance</span>
                  <span class="info-box-number">{{ (int)auth()->user()->wallet }}.00</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    @if(auth()->user()->avatar)
                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/' . auth()->user()->avatar) }}" alt="User profile picture">
                    @else
                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/avatar.png') }}" alt="User profile picture">
                    @endif
                  </div>

                  <h3 class="profile-username text-center">{{ ucwords(auth()->user()->name) }}</h3>

                  <p class="text-muted text-center">{{ auth()->user()->role() }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email </b> <a class="float-right">{{ auth()->user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Username </b> <a class="float-right">{{ strtolower(auth()->user()->username) }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone num </b> <a class="float-right">{{ auth()->user()->phone }}</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              @if(auth()->user()->is_admin)
                  <h5>Toggle quiz type status</h5>
                  <div class="info-box mb-3">
                    @foreach ($all_quiz_types as $quiz_type)
                      <div class="col-md-6">
                          {{ $quiz_type->title }}
                          <div class="switch">
                            <input id="cmn-toggle-{{ $quiz_type->id }}" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" value="{{ $quiz_type->id }}" {{ $quiz_type->is_active ? 'checked': '' }}>
                            <label for="cmn-toggle-{{ $quiz_type->id }}"></label>
                          </div>
                      </div>
                    @endforeach
                  </div>
              @endif
              
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Update Profile Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="#baccount" data-toggle="tab">Update Bank Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#deposit" id="deposit-trigger" data-toggle="tab">Deposit</a></li>
                  </ul>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    
                    <!-- user_details plane -->
                      @include('partials.planes.user_details')

                    <!-- password plane -->
                      @include('partials.planes.password')

                    <!-- bank_details plane -->
                      @include('partials.planes.bank_details')

                    <!-- deposit plane -->
                      @include('partials.planes.deposit')

                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!--/. container-fluid -->
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')
  <script>
  console.log('Hey');
      let links=Array.from(document.querySelectorAll('a.disabled'));
      $(links).on('click',(evt)=>{
        evt.preventDefault();
      })
  </script>
@endsection