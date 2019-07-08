<div class="tab-pane" id="password">
    <form class="form-horizontal" action="{{ route('change_password') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="oldPass" class="col-sm-6 control-label">Old Password</label>
            <div class="col-sm-10">
                <input id="oldPass" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" placeholder="Old Password"required>
                @if ($errors->has('old_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="newPass" class="col-sm-6 control-label">New Password</label>
            <div class="col-sm-10">
                <input id="newPass" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New Password"required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
        <label for="newPass2" class="col-sm-6 control-label">Confirm New Password</label>

        <div class="col-sm-10">
                <input  required class="form-control" id="newPass2" type="password" name="password_confirmation"  placeholder="Confirm New Password" required>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
        </div>
    </form>
</div>