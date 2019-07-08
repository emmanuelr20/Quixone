@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('name') register-page @endsection
@section('content')
<div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
  
          <form action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
  
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="exampla@mail.com">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
  
            <div class="form-group has-feedback">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required placeholder="Username">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
  
            <div class="form-group has-feedback">
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="phone eg. 08000000000">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
  
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required placeholder="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
  
            <div class="form-group has-feedback">
                <input id="password_confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password') }}" required placeholder="password">              
            </div>
            <span>Choose your avatar</span>
  
            <div class="row registration-avatar">
              <input type="radio" name="avatar" id="avatar1" value="avatar1.png" class="input-hidden" checked />
              <label for="avatar1">
                <img src="{{ asset('dist/img/avatar1.png') }}" alt="avatar" />
              </label>
  
              <input type="radio" name="avatar" id="avatar2" value="avatar2.png" class="input-hidden" />
              <label for="avatar2">
                <img src="{{ asset('dist/img/avatar2.png') }}" alt="avatar" />
              </label>
  
              <input type="radio" name="avatar" id="avatar3" value="avatar3.png" class="input-hidden" />
              <label for="avatar3">
                <img src="{{ asset('dist/img/avatar3.png') }}" alt="avatar" />
              </label>
  
              <input type="radio" name="avatar" id="avatar4" value="avatar4.png" class="input-hidden" />
              <label for="avatar4">
                <img src="{{ asset('dist/img/avatar4.png') }}" alt="avatar" />
              </label>
              <input type="hidden" name="referrer" value="{{ $referrer }}">
            </div>
            <div class="row">
              <div class="col-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" required> I agree to the
                    <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
      </div>
@endsection

@section('scripts')