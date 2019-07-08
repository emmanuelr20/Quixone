<div class="modal fade" tabindex="-1" role="dialog" id="testimonies">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Share the Goodnews</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{ route('add_testimony') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
            <div class="form-group">
                <textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Enter Testimony Here" required></textarea>
            </div>
            </div>
    
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>