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
        <div class="clearfix text-right">
            <a href="{{ route('admin.cms.create') }}" class="btn btn-info mb-2">Create CMS <i class="icon-plus-circle2 ml-1 "></i></a>
        </div>
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">CMS</h5>
            </div>
            <table class="table datatable-basic" id="cms_table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Page Slug</th>
                        <th>Page Name</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
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
<script src="{{ asset('public/backend/js/cms/cms.js') }}"></script>
@endsection