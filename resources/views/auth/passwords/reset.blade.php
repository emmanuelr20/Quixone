@extends('layouts.auth')
@section('title') Password Reset @endsection
@section('name') login-page @endsection
@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <h5 class="login-box-msg">Reset Password</h5>

        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="example@mail.com">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required placeholder="New password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input id="password2" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required placeholder="New password confirm">
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
            <br>
            <p class="mb-0 text-center">
                <a href="{{ route('login') }}" class="text-center">Go to Login</a>
            </p>
        </form>
    </div>
</div>
@endsection

