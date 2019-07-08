<div class="tab-pane" id="baccount">
    <form class="form-horizontal" action="{{ route('update_bank_details') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        <label for="aname" class="col-sm-6 control-label">Account Name</label>

        <div class="col-sm-10">
            <input id="aname" type="text" class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" value="{{ auth()->user()->bank_account_name }}" required>
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
            <input id="accnum" type="number" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{ auth()->user()->bank_account_no }}" required>
            @if ($errors->has('account_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('account_number') }}</strong>
                </span>
            @endif
        </div>
        </div>
        <div class="form-group">
        <label for="bname" class="col-sm-6 control-label">Bank Name</label>

        <div class="col-sm-10">
                <input id="bname" type="text" class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" value="{{ auth()->user()->bank_name }}" required>
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