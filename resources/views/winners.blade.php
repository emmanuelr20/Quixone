@extends('layouts.authenticated')
@section('title')
    Unpaid Winners
@endsection

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $status }} Winners</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">{{ $status }} Winners</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
         <!-- Default box -->
         <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">List of {{ $status }} Winners</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th> # </th>
                        <th>Users Email</th>
                        <th>Phone</th>
                        <th>Game type</th>
                        <th>Amount</th>
                        @if ($status == 'Unpaid')
                          <th>Mark as paid</th>
                        @endif
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $quiz->id }}</td>
                                <td><a href="#" data-toggle="modal" data-target="#info{{ $quiz->id }}">{{ $quiz->user->email }}</a></td>
                                <td>{{ $quiz->user->phone }}</td>
                                <td>{{ $quiz->quiz_type->title }}</td>
                                <td>{{ $quiz->quiz_type->id == 2 ? '5000' : '10000' }}</td>   
                                @if ($status == 'Unpaid')
                                  <td><a href="{{ route('mark_paid', $quiz->id) }}" class="text-center"><i class="fa fa-2x fa-check text-primary"></i></a></td>                                                  
                                @endif          
                            </tr>
                            @include('partials.modals.infocard', ['user' => $quiz->user, 'id' => $quiz->id])
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $quizzes->links() }}
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
        </div>
        <!-- /.content -->
      </div>
@endsection

@section('scripts')
@endsection