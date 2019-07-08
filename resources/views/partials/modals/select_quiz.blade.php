<div class="modal fade" tabindex="-1" role="dialog" id="game_type">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Select Quiz Type</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <br>
        @forelse ($quiz_types as $quiz_type)
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-lg-10">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $quiz_type->title }}</h5>
                  <p class="card-text">{{ $quiz_type->description }}</p>
                  <a href="{{ route('select_subject', $quiz_type->id) }}" class="card-link pull-right">Play Now</a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-lg-10">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">There is currently no availble quiz</h5>
                </div>
              </div>
            </div>
          </div>
        @endforelse
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>