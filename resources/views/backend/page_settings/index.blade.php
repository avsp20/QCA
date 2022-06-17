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
                <h5 class="card-title">Front Page Settings</h5>
            </div>
            <table class="table datatable-basic" id="pages_table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th data-orderable="false" width="9%">Image</th>
                        <th>Page</th>
                        <th>Title</th>
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
<script src="{{ asset('public/backend/js/page_settings/page_setting.js') }}"></script>
@endsection