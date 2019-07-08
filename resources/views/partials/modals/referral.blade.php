<div class="modal fade" tabindex="-1" role="dialog" id="referral">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Refer a Friend</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>
            <input type="text" class="form-control" disabled name="" id="referal_code" value="{{ route('refer', auth()->user()->username) }}">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="copy_referal">Copy</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>