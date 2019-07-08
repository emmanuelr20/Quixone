<div class="modal fade" tabindex="-1" role="dialog" id="updateAccount">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update bank account details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('update_bank_details') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="aname" class="col-sm-6 control-label">Account Name</label>
            
                    <div class="col-sm-10">
                        <input id="maname" type="text" class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" value="{{ auth()->user()->bank_account_name }}" required>
                        @if ($errors->has('account_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="accnum" class="col-sm-6 control-label">Account Number</label>
            
                    <div class="col-sm-10">
                        <input id="maccnum" type="number" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{ auth()->user()->bank_account_no }}" required>
                        @if ($errors->has('account_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_number') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="mbname" class="col-sm-6 control-label">Bank Name</label>
            
                    <div class="col-sm-10">
                            <input id="mbname" type="text" class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" value="{{ auth()->user()->bank_name }}" required>
                            @if ($errors->has('bank_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                </span>
                            @endif
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>