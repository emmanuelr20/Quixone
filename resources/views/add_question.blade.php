@extends('layouts.authenticated')
@section('title')
    Add Question
@endsection
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add New Question</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Set Exam</li>
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
            <div class="content">
                <div class="container-fluid">
                    <form action="{{ route('add_question') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Enter question and its option(s)</h5>
                                        <br>
                                        <div class="card-text">
                                            <div class="form-group">
                                                    <select name="subject" id="" class="form-control" required>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="card-text">
                                            <div class="form-group">
                                                <select name="question_level" id="" class="form-control" required>
                                                    @foreach ($question_levels as $question_level)
                                                        <option value="{{ $question_level->id }}">{{ $question_level->title }}</option>                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-text">
                                            <div class="form-group">
                                                <select name="quiz_type" id="" class="form-control" required>
                                                    @foreach ($quiz_types as $quiz_type)
                                                        <option value="{{ $quiz_type->id }}">{{ $quiz_type->title }}</option>                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-text">
                                            <div class="form-group">
                                                <select name="question_type" id="" class="form-control" required>
                                                    @foreach ($question_types as $question_type)
                                                        <option value="{{ $question_type->id }}">{{ $question_type->name }}</option>                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-text">
                                            <div class="form-group">
                                                <textarea type="text" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" rows="5" cols="10" name="body" placeholder="Question" required>{{ old('body') }}</textarea>
                                                @if ($errors->has('body'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('body') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-text">
                                            <div class="form-group">
                                                <input id="newPass" type="text" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" value="{{ old('answer') }}" placeholder="Answer"required>
                                                @if ($errors->has('answer'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('answer') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-text">
                                            <p class="text-info"><small><b>* ignore options if question type is german</b></small></p>
                                            <div class="form-inline">
                                                @for($i = 0; $i<3; $i++)
                                                    <input id="" type="text" class="form-control{{ $errors->has('options') ? ' is-invalid' : '' }} col-md-4" name="options[]" value="{{ old('options.' . $i) }}" placeholder="option {{ $i+1 }}">
                                                    @if ($errors->has('options'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('options') }}</strong>
                                                        </span>
                                                    @endif
                                                @endfor 
                                            </div>
                                        </div>

                                        <br>
                                        <a href="#" class="card-link pull-right"><button type="submit" class="btn btn-primary">Submit</button></a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.col-md-6 -->

                        </div>
                        <!-- /.row -->
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

@endsection
@section('scripts')
    
@endsection