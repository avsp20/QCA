@extends('backend.auth-layouts.app')
@section('content')
<!-- Password recovery form -->
<form class="login-form" method="POST" action="{{ route('admin.password.email') }}">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">{{ __('Reset Password') }}</h5>
                <span class="d-block text-muted">We'll send you instructions in email</span>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group form-group-feedback form-group-feedback-right">
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') }}">
                <div class="form-control-feedback">
                    <i class="icon-mail5 text-muted"></i>
                </div>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> {{ __('Send Password Reset Link') }}</button>
            </div>
            <div class="text-center">
                <a href="{{ route('admin.login') }}">Back to login page?</a>
            </div>
        </div>
    </div>
</form>
<!-- /password recovery form -->
@endsection