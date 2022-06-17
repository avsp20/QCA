<!-- .row -->
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="{{ asset('public/frontend/img/large/img1.jpg') }}">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="{{ asset('public/frontend/img/users/1.jpg') }}" class="thumb-lg img-circle" alt="img"></a>
                        @if(Auth::check())
                            <h4 class="text-white">{{ Auth::user()->user_fname }} {{ Auth::user()->user_lname }}</h4>
                            <h5 class="text-white">{{ Auth::user()->user_email }}</h5> </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <li class="tab active">
                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>First Name</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_fname }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Last Name</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_lname }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Company Name</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_company }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_location }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_email }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Main Company's Phone</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_contact_main }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->user_contact_mobile }}</p>
                        </div>
                    </div>
                    <hr>
                    @if(request()->segment(2) == 'profile')
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a class="btn btn-default" href="{{ route('user.dashboard') }}">Go Back</a>
                                    <a class="btn btn-success ml-2" href="{{ route('user.edit-profile') }}">Edit Profile</a>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if(request()->segment(2) == 'edit-profile')
                        <form class="form-horizontal form-material" method="POST" action="{{ route('user.update-profile') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Main Company's Phone <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="main_phone" placeholder="123 456 7890" class="form-control form-control-line" value="{{ old('main_phone',$user->user_contact_main) }}">
                                    <span class="text-danger">{{ $errors->first('main_phone') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Mobile <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="mobile" placeholder="123 456 7890" class="form-control form-control-line" value="{{ old('mobile',$user->user_contact_mobile) }}">
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Change Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="********" class="form-control form-control-line">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a class="btn btn-default" href="{{ route('user.profile') }}">Go Back</a>
                                    <button class="btn btn-success ml-2">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->