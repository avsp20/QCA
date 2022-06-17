@extends('backend.auth-layouts.app')
@section('content')
<!-- Password recovery form -->
<form method="POST" class="login-form" action="{{ route('admin.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">{{ __('Reset Password') }}</h5>
            </div>
            <div class="text-center">
                @if (session('success'))
                <div class="alert alert-success alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">{{ session('success') }}</span>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">{{ session('error') }}</span>
                </div>
                @endif
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="password" autofocus placeholder="{{ __('Password') }}">
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}<i class="icon-circle-right2 ml-2"></i></button>
            </div>
            <div class="text-center">
                <a href="{{ route('admin.login') }}">Back to login page?</a>
            </div>
        </div>
    </div>
</form>
<!-- /password recovery form -->
@endsection
