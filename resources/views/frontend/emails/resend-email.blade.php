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

        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="email" class="form-control" placeholder="Enter email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary resend-email">Resend email</button>
                </div>
            </div>
        </form>
    </div>
@endsection