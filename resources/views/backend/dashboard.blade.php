@extends('backend.master')
@section('content')
<!-- Content area -->
    <div class="content">
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
        <!-- Dashboard content -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">QNA Favorites</h5>
            </div>
            <table class="table datatable-basic" id="qna_fav_table">
                <thead>
                    <tr>
                        <th data-orderable="false">#</th>
                        <th>Favorites QNA</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Users Need Approval</h5>
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
                        <th>Company Name</th>
                        <th>Full Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Main phone/Mobile</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Users/Client List</h5>
            </div>
            <div class="row ml-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search_user_company" id="search_user_company" placeholder="Search Company or Fullname">
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="search_user_location">
                        <option value="">Filter Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-light" type="button" id="reset_user_search">Reset</button>
                </div>
            </div>
            <table class="table datatable-basic" id="users_table_two">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Full Name</th>
                        <th>Location</th>
                        <th>Date Registered</th>
                        <th>Main Phone/Mobile</th>
                        <th>Total Qts</th>
                        <th>Date Last Post Qts</th>
                        <th>Date Last Answered</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">QNA Need to be Answered</h5>
            </div>
            <div class="row ml-2">
                <div class="col-md-2">
                    <select class="form-control" id="qna_search_location">
                        <option value="">Filter Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="search_jurisdiction">
                        <option value="">Search Jurisdiction</option>
                        @if(count($jurisdictions) > 0)
                            @foreach($jurisdictions as $jurisdiction)
                                <option value="{{ $jurisdiction }}">{{ $jurisdiction }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-light" type="button" id="reset_search">Reset</button>
                </div>
            </div>
            <table class="table datatable-basic" id="qna_answered_table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Company Name</th>
                        <th>Full Name</th>
                        <th>Location</th>
                        <th>Jurisdiction</th>
                        <th>Date</th>
                        <th>Question</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card">
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
                        <a href="javascript:void(0)" onclick="QNABulk()" class="btn btn-primary">Apply</a>
                    </div>
                </div>
            </div>
            <div class="row ml-2 mb-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search_keyword" id="search_keyword" placeholder="Search Keyword">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search_company_fullname" id="search_company_fullname" placeholder="Search Company or Fullname">
                </div>
            </div>
            <div class="row ml-2">
                <div class="col-md-2">
                    <select class="form-control" id="search_qna_location">
                        <option value="">Search Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
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
                <div class="col-md-2">
                    <button class="btn btn-light" type="button" id="reset_qna_search">Reset</button>
                </div>
            </div>
            <table class="table datatable-basic" id="qna_table">
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
        <!-- /basic datatable -->
    </div>
<!-- /content area -->
@endsection
@section('script')
<script type="text/javascript">
    var users_table = '{{ route("admin.users-datatables") }}';
    var qna_answered_table = '{{ route("admin.qna-answered-datatables") }}';
    var qna_datatables = '{{ route("admin.qna-datatables") }}';
    var all_users_table = '{{ route("admin.all-users-datatables") }}';
</script>
<script src="{{ asset('public/backend/js/dashboard.js') }}"></script>
@endsection