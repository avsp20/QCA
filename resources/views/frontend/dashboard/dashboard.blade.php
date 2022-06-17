@extends('frontend.dashboard.master')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">QNA Favourites</h3>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
                <table id="qna_fav_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2 col-sm-4 col-xs-12 mb-1" style="margin-bottom: 10px;">
        <a class="btn btn-primary" href="{{ route('user.qna.create') }}"><i class="icon-plus m-r-5"></i> Add Question</a>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <div class="tc-header">
                <div class="tc-header-right">
                     <h3 class="box-title m-0">QNA List</h3>
                </div>
                <div class="tc-header-right">
                    <select class="form-control" id="qna_option">
                        <option value="1">With Selected</option>
                        <option value="2">Bulk Print</option>
                        <option value="3">Bulk Download</option>
                    </select>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="userQNAOption()">Apply</a>
                </div>
            </div>
            <div class="row ml-2">
                <div class="col-md-3">
                </div>
            </div>
            <div class="row ml-2">
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
                <div class="col-md-3">
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
                    <button class="btn btn-light" type="button" id="reset_search">Reset Filter</button>
                </div>
            </div>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
                <table id="qna_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="tbl-heading">
                                <div class="checkbox checkbox-primary select_qna">
                                    <input id="check_qna" type="checkbox">
                                    <label for="check_qna"></label>
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Question</th>
                            <th>Jurisdiction</th>
                            <th data-orderable="false">Favorite</th>
                            <th>Date Answered</th>
                            <th data-orderable="false">Print/Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="tc-header">
                <div class="tc-header-right">
                     <h3 class="box-title m-0">QNA from other member</h3>
                </div>
                <div class="tc-header-right">
                    <select class="form-control" id="qna_option">
                        <option value="1">With Selected</option>
                        <option value="2">Bulk Print</option>
                        <option value="3">Bulk Download</option>
                    </select>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="userQNAOption()">Apply</a>
                </div>
            </div>
            <div class="row ml-2">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="search_keyword" id="search_keyword" placeholder="Search Keyword">
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="search_location">
                        <option value="">Search Location</option>
                        @if(count($locations) > 0)
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="search_others_jurisdiction">
                        <option value="">Search Jurisdiction</option>
                        @if(count($jurisdictions) > 0)
                            @foreach($jurisdictions as $jurisdiction)
                                <option value="{{ $jurisdiction }}">{{ $jurisdiction }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row ml-2 mt-10">
                <div class="col-md-3">
                    <select class="form-control" id="qna_others_answer_date" name="qna_others_answer_date">
                        <option value="">Is Q Answered</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="is_others_favorite" name="is_others_favorite">
                        <option value="">Show Only Favorites</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-light" type="button" id="others_reset_search">Show All</button>
                </div>
            </div>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
                <table id="qna_others_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="tbl-heading">
                                <div class="checkbox checkbox-primary select_other_qna">
                                    <input id="check_qna_user" type="checkbox">
                                    <label for="check_qna_user"></label>
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Question</th>
                            <th>Location</th>
                            <th>Jurisdiction</th>
                            <th data-orderable="false">Favorite</th>
                            <th>Date Answered</th>
                            <th data-orderable="false">Print/Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var qna_table = '{{ route("user.qna-datatables") }}';
    var other_qna_table = '{{ route("user.other-qna-datatables") }}';
</script>
<script src="{{ asset('public/frontend/js/dashboard.js') }}"></script>
<script src="{{ asset('public/frontend/js/common.js') }}"></script>
@endsection