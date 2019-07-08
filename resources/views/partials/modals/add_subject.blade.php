<div class="modal fade" tabindex="-1" role="dialog" id="add_subject">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Subject</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{ route('add_subject') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="msname" placeholder="Subject name" required autofocus>
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