@extends('backend.master')
@section('css')
<style type="text/css">
    .fileinput-upload.fileinput-upload-button{
        display: none;
    }
    .kv-file-remove{
        float: right;
    }
    .kv-file-zoom{
        display: none;
    }
    .file-upload-indicator{
        display: none;
    }
    .kv-file-download{
        display: none;
    }
</style>
<script src="{{ asset('public/backend/js/ckeditor/ckeditor.js') }}"></script>
@endsection
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
                        <h5 class="card-title">Instruction Forms Page Settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.common-page-settings',[@$main_page->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Page: <span class="text-danger">*</span></label>
                                <select class="form-control form-control-select2" id="page_name" data-fouc name="page">
                                    @if(count($pages) > 0)
                                        @foreach($pages as $key => $page)
                                            @if($key == 'instruction-forms')
                                                <option value="{{ $key }}" {{ ($key == old('page',@$main_page->page)) ? "selected" : "" }}>{{ $page }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('page') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter instruction forms page title" value="{{ old('title', @$main_page->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Short Description:</label>
                                <input type="text" name="short_description" class="form-control" placeholder="Enter short description" value="{{ old('short_description', @$main_page->short_description) }}">
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Banner Image Upload:</label>
                                <input type="file" id="banner_image" name="banner_image" class="file-input" data-fouc>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section1 Heading:</label>
                                        <input type="text" name="section1_heading" class="form-control" placeholder="Enter home page section1 heading" value="{{ old('section1_heading', @$instruction_forms->section1_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section1 Sub Heading:</label>
                                        <input type="text" name="section1_sub_heading" class="form-control" placeholder="Enter home page section1 sub heading" value="{{ old('section1_sub_heading', @$instruction_forms->section1_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section1:</label>
                                <textarea rows="5" name="section_1" class="form-control" id="section_1">{{ old('section1', @$instruction_forms->section1) }}</textarea>
                            </div>
                            <div class="text-right">
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
@section('script')
<script type="text/javascript">
    var caption = '{{ @$banner->banner_image }}';
    var image = base_public_url + 'pages/{!! @$banner->banner_image !!}';
    var key = '{{ @$banner->id }}';
    var deleteUrl = "{{ route('admin.delete-banner') }}";
</script>
<script src="{{ asset('public/backend/js/common.js') }}"></script>
@endsection