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
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Users</h5>
            </div>
            <div class="row ml-2">
                <div class="col-md-2">
                    <select class="form-control" id="search_location">
                        <option value="">Filter Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <table class="table datatable-basic" id="users_table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
    </div>
<!-- /content area -->
@endsection
@section('script')
<script src="{{ asset('public/backend/js/users/user.js') }}"></script>
@endsection