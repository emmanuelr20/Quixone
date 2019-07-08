@extends('layouts.authenticated')
@section('title')
    Results
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">      
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row result">
              <div class="col-md-1"></div>
               <div class="col-md-10">
                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <div class="card-round-header">
                          <h3> {{ round(floatval(100 * $quiz->score/$quiz->questions->count()), 2) }}% </h3>
                    </div>
                    <h4 class="card-title">Quiz Results</h4>
                    <br>
                    <p>Your got <strong>{{ $quiz->score }}</strong> of {{ $quiz->questions->count() }} right</p>
                    <br>
    
                    @if($quiz->is_winner)
                        <div class="alert alert-success"><h3>Congratulations!</h3> We will verify your game and credit your account within 48 hours. <br><a href="#" data-toggle="modal" class="card-link" data-target="#updateAccount">Update bank your bank details</a></div> 
                    @else 
                        <div class="alert alert-danger"><h3>Sorry you did not win this game!</h3>You stand a better chance when you play again</div>  
                    @endif
                    <a href="#" data-toggle="modal" data-target="#game_type" class="card-link">Play Again</a>
                  </div>
                </div><!-- /.card -->
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