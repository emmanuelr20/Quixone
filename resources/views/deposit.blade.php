@extends('layouts.authenticated')
@section('title')
  Deposit
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Deposit to Wallet</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Deposit</li>
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
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Current Balance</span>
                    <span class="info-box-number">{{ (int)auth()->user()->wallet }}.00</span>
                </div>
                <!-- /.info-box-content -->
                </div>
              </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#deposit" >Deposit</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}" >Go to dahsboard</a></li>
                  </ul>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- deposit plane -->
                      @include('partials.planes.deposit')
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