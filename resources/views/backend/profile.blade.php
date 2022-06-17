@extends('backend.master')

@section('breadcrumb')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span>Edit Profile</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="content">
    <!-- Vertical form options -->
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                @if (session('status'))
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">{{ session('status') }}</span>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">{{ session('error') }}</span>
                </div>
                @endif
            </div>
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Profile</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.edit-profile', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>First Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="user_fname" placeholder="Enter your first name" value="{{ old('fname',$user->user_fname) }}">
                                <span class="text-danger">{{ $errors->first('user_fname') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="user_lname" placeholder="Enter your last name" value="{{ old('fname',$user->user_lname) }}">
                                <span class="text-danger">{{ $errors->first('user_lname') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Email: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="user_email" placeholder="Enter your email" value="{{ old('fname',$user->user_email) }}">
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Primary Contact: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="user_contact_main" placeholder="Enter primary contact" value="{{ old('fname',$user->user_contact_main) }}">
                                <span class="text-danger">{{ $errors->first('user_contact_main') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Secondary Contact:</label>
                                <input type="text" class="form-control" name="user_contact_mobile" placeholder="Enter secondary contact" value="{{ old('fname',$user->user_contact_mobile) }}">
                                <span class="text-danger">{{ $errors->first('user_contact_mobile') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location: <span class="text-danger">*</span></label>
                            <textarea rows="3" cols="5" class="form-control" name="user_location" placeholder="Enter your location here">{{ old('fname',$user->user_location) }}</textarea>
                            <span class="text-danger">{{ $errors->first('user_location') }}</span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Profile Image</label>
                                <input type="file" name="user_image" id="user_image" class="form-control" onchange="readURL(this);">
                            </div>
                            <div class="form-group col-md-4">
                                @if($user->user_image != null)
                                    <img src="{{ asset('public/backend/images/profiles').'/'.$user->user_image}}" alt="Profile Image" class="img-fluid mb-2" id="usr_img" width="40%">
                                @else
                                    <img src="{{ asset('public/frontend/img/no-image-available.png') }}" id="usr_img" width="40%">
                                @endif
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-success">Update <i class="icon-arrow-right14"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
    <!-- /vertical form options -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#usr_img').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
