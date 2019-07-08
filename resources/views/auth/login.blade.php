@extends('layouts.auth')
@section('title')
    Log in
@endsection
@section('name') login-page @endsection

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start playing!</p>
          <form action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
              <div class="col-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
          </p>
          <p class="mb-0">
            <a href="{{ route('resend_activation') }}" class="text-center">Resend Activation</a>
          </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

@section('scripts')
@endsection
  


