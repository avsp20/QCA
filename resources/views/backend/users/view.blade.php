@extends('backend.master')
@section('content')
<!-- Content area -->
    <div class="content">
        <div class="text-center">
            @if (session('success'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="font-weight-semibold">{{ session('success') }}</span>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="font-weight-semibold">{{ session('error') }}</span>
            </div>
            @endif
        </div>
        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">View User</h5>
                    </div>

                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Registered Date:</label><label class="form-control">{{ isset($user->created_at) ? \Carbon\Carbon::parse($user->created_at)->format('jS F, Y H:i:s') : '-'; }}</label>
                            </div>
                            <div class="form-group">
                                <label>First Name:</label><label class="form-control">{{ $user->user_fname }}</label>
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label><label class="form-control">{{ $user->user_lname }}</label>
                            </div>
                            <div class="form-group">
                                <label>Company Name:</label><label class="form-control">{{ $user->user_company }}</label>
                            </div>
                            <div class="form-group">
                                <label>Location:</label><label class="form-control">{{ $user->user_location }}</label>
                            </div>
                            <div class="form-group">
                                <label>Email:</label><label class="form-control">{{ $user->user_email }}</label>
                            </div>
                            <div class="form-group">
                                <label>Main Company's Phone:</label><label class="form-control">{{ $user->user_contact_main }}</label>
                            </div>
                            <div class="form-group">
                                <label>Mobile:</label><label class="form-control">{{ $user->user_contact_mobile }}</label>
                            </div>
                            <div class="form-group">
                                <label>Additional Notes:</label>{!! $user->user_initial_notes !!}
                            </div>
                            <div class="text-left">
                                @if($user->user_is_approved == 0)
                                    <a href="{{ route('admin.approve-user',[$user->id]) }}" class="btn btn-success">Accept</a>
                                    <a href="{{ route('admin.reject-user',[$user->id]) }}" class="btn btn-danger ml-1">Reject</a>
                                @elseif($user->user_is_approved == 1)
                                    <span class="badge badge-success badge-user">Approved</span>
                                @elseif($user->user_is_approved == 2)
                                    <span class="badge badge-danger badge-user">Rejected</span>
                                @endif
                            </div>
                            <div class="text-right">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light"><i class="icon-arrow-left13"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Reset Password</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.reset-password', [$user->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="col-md-5">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    {{--<div class="card-header header-elements-inline">
                        <h5 class="card-title">Users</h5>
                        <a href="{{ route('admin.user-qna',[$user->id]) }}" target="_new" class="btn btn-primary">Bulk</a>
                    </div>--}}
                    <div class="card-header pb-0">
                        <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible alert-checkbox" style="display: none;">
                            <span class="font-weight-semibold missing-check"></span>
                        </div>
                        <div class="tc-header">
                            <div class="tc-header-right">
                                 <h5 class="card-title">Search QNA</h5>
                            </div>
                            <div class="tc-header-right">
                                <select class="form-control" id="qna_option">
                                    <option value="1">With Selected</option>
                                    <option value="2">Bulk Print</option>
                                    <option value="3">Bulk Download</option>
                                </select>
                                <a href="javascript:void(0)" onclick="userQNABulk({{ $user->id }})" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2">
                        <div class="col-md-3">
                            <select class="form-control" id="search_qna_jurisdiction">
                                <option value="">Search Jurisdiction</option>
                                @if(count($jurisdictions) > 0)
                                    @foreach($jurisdictions as $jurisdiction)
                                        <option value="{{ $jurisdiction }}">{{ $jurisdiction }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="qna_answer_date" name="qna_answer_date">
                                <option value="">Is Q Answered</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="is_favorite" name="is_favorite">
                                <option value="">Show Only Favorites</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <table class="table datatable-basic" id="users_qna_table">
                        <thead>
                            <tr>
                                <th class="tbl-heading">
                                    <div class="custom-control custom-checkbox select_all">
                                        <input type="checkbox" class="custom-control-input" id="check_qna">
                                        <label class="custom-control-label" for="check_qna"></label>
                                    </div>
                                </th>
                                <th width="9%">Date</th>
                                <th>Question</th>
                                <th>Location</th>
                                <th>Jurisdiction</th>
                                <th>Favorite</th>
                                <th width="10%">Date Answered</th>
                                <th data-orderable="false">Print/Download</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
    </div>
    <!-- test -->
<!-- /content area -->
@endsection
@section('script')
<script src="{{ asset('public/backend/js/users/user.js') }}"></script>
<script type="text/javascript">
    // var qna_bulk = {{--'{{ route("admin.user-qna",[$user->id]) }}';--}}
</script>
@endsection
