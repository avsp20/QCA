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
                <h5 class="card-title">QNA</h5>
            </div>
            <div class="row ml-2">
                <div class="col-md-2">
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
            <table class="table datatable-basic" id="qna_table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Date</th>
                        <th>Question</th>
                        <th>Location</th>
                        <th>Jurisdiction</th>
                        <th>Favorite</th>
                        <th>Date Answered</th>
                        <th data-orderable="false">Print/Download</th>
                        <!-- <th data-orderable="false">Action</th> -->
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
<script src="{{ asset('public/backend/js/qna/qna.js') }}"></script>
@endsection