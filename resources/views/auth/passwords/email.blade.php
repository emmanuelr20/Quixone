@extends('layouts.auth')
@section('title') Password Reset @endsection
@section('name') login-page @endsection
@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <h5 class="login-box-msg">Reset Password</h5>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="example@mail.com">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Send Password Reset Link') }}
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
