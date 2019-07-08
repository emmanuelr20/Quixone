<div class="row">
    <div class="col-lg-8">
        
        <div class="card">
        <div id="timer">
            <div id="left"></div>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mag10">{{ $question->body }}</h6>
            <br>  
            <div class="card-text">
                <div class="funkyradio">
                    @if(!$question->isGerman())
                        @foreach($question->options->sortBy('body') as $option)
                            <div class="funkyradio-success">
                                <input type="radio" value="{{ $option->id }}" name="answer" id="answer{{ $option->id }}" />
                                <label for="answer{{ $option->id }}">{{ $option->body }}</label>
                            </div>
                        @endforeach
                    @else
                        <p class="option" >
                            <textarea class="form-control" name="answer" rows="7" placeholder="Type answer..." rows="2" id="answer" autofocus></textarea>
                        </p>
                    @endif
                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                    <input type="hidden" id="quiz-id" value="{{ $quiz->id }}">
                </div>
            </div>
            <button class="card-link btn btn-primary pull-right" id="submit-answer">Next</button>
        </div>
        </div>
    </div>
    <div class="col-lg-4 circular-timer">
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mag10">Timer </h6>
                <div class="card-text"> 
                    <div class="container">
                        <div class="row">
                        <div class="progress blue">
                            <span class="progress-left">
                                <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value" id="timer-value"></div>
                        </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row --> 