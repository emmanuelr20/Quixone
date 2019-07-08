@extends('layouts.authenticated')
@section('title')
    Select Subjects
@endsection

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Select Game Subject</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Play Now</a></li>
                  <li class="breadcrumb-item active">Select Subject</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-2"></div>
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Select Subjects</h3>
                    <br>  
                    <div class="card-text">
                           <div class="funkyradio">
                               <form action="{{ route('start_quiz', $quiz_type->id) }}" method="POST">
                                   {{ csrf_field() }}
                                   @foreach ( $subjects as $subject )
                                      @if($subject->ready($quiz_type->id))
                                        <div class="funkyradio-success">
                                            <input type="checkbox" class="{{ $quiz_type->id == 1 ? 'multiple':'single' }}" name="subjects[]" id="checkbox{{ $subject->id }}" value="{{ $subject->id }}"/>
                                            <label for="checkbox{{ $subject->id }}">{{ ucwords($subject->name) }}</label>
                                        </div>
                                      @endif
                                    @endforeach
                                    <button type="submit" id="proceed" href="#" class="card-link btn btn-primary pull-right">Proceed</button>
                               </form>
                           </div>
                       </div>
                      </div>
                  </div>
                </div>
              </div>
              </div>
            <!-- /.row --> 
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
@endsection

@section('scripts')
@endsection