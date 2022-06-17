@extends('frontend.dashboard.master')
@section('css')
<style type="text/css">
    .login-register {
        background: url({{ asset('public/frontend/dashboard/images/login-register.jpg') }}) center center/cover no-repeat!important;
    }
</style>
@endsection
@section('content')
<div class="login-box">
    <div class="white-box">
        <form class="form-horizontal form-material" id="regsiterform" action="{{ route('user.register.submit') }}" method="POST">
            @csrf
            <h3 class="box-title m-b-20">{{ __('Register') }}</h3>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" name="fname" type="text" placeholder="First Name" value="{{ old('fname') }}">
                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" name="lname" type="text" placeholder="Last Name" value="{{ old('lname') }}">
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" name="company_name" type="text" placeholder="Company Name (inc.sole trader)" value="{{ old('company_name') }}">
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <select class="form-control" name="location" data-placeholder="Select Location" tabindex="1">
                        <option value="0">Select Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}" {{ (old('location') == $location) ? "selected" : "" }}>{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" name="email" type="text" placeholder="Email" value="{{ old('email') }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" name="main_phone" type="text" placeholder="Main Company's Phone" value="{{ old('main_phone') }}">
                    <span class="text-danger">{{ $errors->first('main_phone') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="text" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <label class="form-label">Additonal notes</label>
                    <textarea name="additional_note" id="additional_note" rows="6" cols="80">{{ old('additional_note') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary p-t-0">
                        <input id="checkbox-signup" type="checkbox" name="accept_terms" value="1" {{ (! empty(old('accept_terms')) ? 'checked' : '') }}>
                        <label for="checkbox-signup"> I agree to all <a href="#">Terms & Conditions</a></label>
                    </div>
                    <span class="text-danger">{{ $errors->first('accept_terms') }}</span>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Already have an account? <a href="{{ route('user.login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('additional_note');
</script>
@endsection