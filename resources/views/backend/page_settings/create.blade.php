@extends('backend.master')
@section('css')
<style type="text/css">
    .fileinput-upload.fileinput-upload-button{
        display: none;
    }
</style>
@endsection
@section('content')
<!-- Content area -->
    <div class="content">
        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Add Info</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.home-page-settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('backend.page_settings.form')
                            <div class="form-group" id="banner_image_upload">
                                <label>Banner Image Upload:</label>
                                <input type="file" name="banner_image" class="file-input" data-fouc>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('admin.home-page-settings.index') }}" class="btn btn-light"><i class="icon-arrow-left13"></i> Cancel</a>
                                <button type="submit" class="btn btn-success">Save <i class="icon-arrow-right14 ml-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
    </div>
<!-- /content area -->
@endsection