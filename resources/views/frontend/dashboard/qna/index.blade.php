@extends('frontend.dashboard.master')
@section('css')
<style type="text/css">
    #qna_table_filter{
        display: none;
    }
</style>
@endsection
@section('content')
<!-- /row -->
<div class="row">
    <div class="col-lg-2 col-sm-4 col-xs-12 mb-1 text-right" style="margin-bottom: 10px; float: right;">
        <a class="btn btn-primary" href="{{ route('user.qna.create') }}"><i class="icon-plus m-r-5"></i> New QNA</a>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <div class="tc-header">
                <div class="tc-header-right">
                    <h3 class="box-title m-0">QNA List</h3>
                </div>
                @if(Auth::check())
                    <div class="tc-header-right">
                        <select class="form-control" id="qna_option">
                            <option value="1">With Selected</option>
                            <option value="2">Bulk Print</option>
                            <option value="3">Bulk Download</option>
                        </select>
                            @php
                                $user_id = Auth::id();
                            @endphp
                        <a href="javascript:void(0)" class="btn btn-primary" onclick="userQNAOption({{ $user_id }})">Apply</a>
                    </div>
                @endif
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
                    <button class="btn btn-light" type="button" id="reset_search">Reset</button>
                </div>
            </div>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
                <table id="qna_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="tbl-heading">
                                <div class="checkbox checkbox-primary usr-qna">
                                    <input id="user_qna" type="checkbox">
                                    <label for="user_qna"></label>
                                </div>
                            </th>
                            <th>Date</th>
                            <th>Question</th>
                            <th>Jurisdiction</th>
                            <th data-orderable="false">Favorite</th>
                            <th>Date Answered</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
@section('script')
<script type="text/javascript">
    var qna_table = window.location.href;
</script>
<script src="{{ asset('public/frontend/js/common.js') }}"></script>
@endsection