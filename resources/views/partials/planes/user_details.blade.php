<div class="tab-pane active" id="account">
        <form class="form-horizontal" action="{{ route('update_profile') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="accName" class="col-sm-6 control-label"> Full Name </label>

            <div class="col-sm-10">
              <input id="accName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ auth()->user()->name }}" required autofocus>
              @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-6 control-label"> Email </label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="accNum" name="email" value="{{ auth()->user()->email }}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="uname" class="col-sm-6 control-label">Username</label>

            <div class="col-sm-10">
              <input id="uname" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ auth()->user()->username }}" required>
              @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="pnum" class="col-sm-6 control-label"> Phone Number </label>

            <div class="col-sm-10">
              <input id="pnum" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ auth()->user()->phone }}" required>
              @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Update</button>
            </div>
          </div>
        </form>
      </div>