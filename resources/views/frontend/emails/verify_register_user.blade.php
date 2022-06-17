@extends('frontend.master')
@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Email Verification</h1>

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

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                A fresh verification link has been sent to your email address.
            </div>
        @endif

        Before proceeding, please check your email for a verification link. If you did not receive the email,
        <a href="{{ route('verification.resend-email') }}" class="d-inline btn btn-link p-0">
            click here to request another
        </a>.
    </div>
@endsection