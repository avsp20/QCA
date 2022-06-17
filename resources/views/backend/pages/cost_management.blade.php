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
                        <h5 class="card-title">Cost Management Page Settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store-cost-management-page-settings',[@$main_page->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Page: <span class="text-danger">*</span></label>
                                <select class="form-control form-control-select2" id="page_name" data-fouc name="page">
                                    @if(count($pages) > 0)
                                        @foreach($pages as $key => $page)
                                            @if($key == 'cost-management')
                                                <option value="{{ $key }}" {{ ($key == old('page',@$main_page->page)) ? "selected" : "" }}>{{ $page }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('page') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter cost management page title" value="{{ old('title', @$main_page->title) }}">
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
                                        <input type="text" name="section1_heading" class="form-control" placeholder="Enter home page section1 heading" value="{{ old('section1_heading', @$cost_management->section1_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section1 Sub Heading:</label>
                                        <input type="text" name="section1_sub_heading" class="form-control" placeholder="Enter home page section1 sub heading" value="{{ old('section1_sub_heading', @$cost_management->section1_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section1:</label>
                                <textarea rows="5" name="section_1" class="form-control" id="section_1">{{ old('section1', @$cost_management->section1) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Text1:</label>
                                        <input type="text" name="section1_text1" class="form-control" placeholder="Enter home page section1 text1" value="{{ old('section1_text1', @$cost_management->section1_text1) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Text2:</label>
                                        <input type="text" name="section1_text2" class="form-control" placeholder="Enter home page section1 text2" value="{{ old('section1_text2', @$cost_management->section1_text2) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Text3:</label>
                                        <input type="text" name="section1_text3" class="form-control" placeholder="Enter home page section1 text3" value="{{ old('section1_text3', @$cost_management->section1_text3) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Text4:</label>
                                        <input type="text" name="section1_text4" class="form-control" placeholder="Enter home page section1 text4" value="{{ old('section1_text4', @$cost_management->section1_text4) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section2 Heading:</label>
                                        <input type="text" name="section2_heading" class="form-control" placeholder="Enter home page section2 heading" value="{{ old('section2_heading', @$cost_management->section2_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section2 Sub Heading:</label>
                                        <input type="text" name="section2_sub_heading" class="form-control" placeholder="Enter home page section2 sub heading" value="{{ old('section2_sub_heading', @$cost_management->section2_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section2:</label>
                                <textarea rows="5" name="section_2" class="form-control" id="section_2">{{ old('section2', @$cost_management->section2) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Section2 Image:</label>
                                        <input type="file" class="form-input-styled" id="section_2_image" name="section_2_image" data-fouc onchange="readURL(this,'section2_image')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$cost_management->section2_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$cost_management->section2_image) }}" alt="section2_image" id="section2_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="section2_image" id="section2_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section3 Heading:</label>
                                        <input type="text" name="section3_heading" class="form-control" placeholder="Enter home page section3 heading" value="{{ old('section3_heading', @$cost_management->section3_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section3 Sub Heading:</label>
                                        <input type="text" name="section3_sub_heading" class="form-control" placeholder="Enter home page section3 sub heading" value="{{ old('section3_sub_heading', @$cost_management->section3_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section3:</label>
                                <textarea rows="5" name="section_3" class="form-control" id="section_3">{{ old('section3', @$cost_management->section3) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section4 Heading:</label>
                                        <input type="text" name="section4_heading" class="form-control" placeholder="Enter home page section4 heading" value="{{ old('section4_heading', @$cost_management->section4_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section4 Sub Heading:</label>
                                        <input type="text" name="section4_sub_heading" class="form-control" placeholder="Enter home page section4 sub heading" value="{{ old('section4_sub_heading', @$cost_management->section4_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section4:</label>
                                <textarea rows="5" name="section_4" class="form-control" id="section_4">{{ old('section3', @$cost_management->section4) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Section4 Image:</label>
                                        <input type="file" class="form-input-styled" id="section_4_image" name="section_4_image" data-fouc onchange="readURL(this,'section4_image')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$cost_management->section4_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$cost_management->section4_image) }}" alt="section4_image" id="section4_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="section4_image" id="section4_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section5 Heading:</label>
                                        <input type="text" name="section5_heading" class="form-control" placeholder="Enter home page section5 heading" value="{{ old('section5_heading', @$cost_management->section5_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section5 Sub Heading:</label>
                                        <input type="text" name="section5_sub_heading" class="form-control" placeholder="Enter home page section5 sub heading" value="{{ old('section5_sub_heading', @$cost_management->section5_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section5:</label>
                                <textarea rows="5" name="section_5" class="form-control" id="section_5">{{ old('section3', @$cost_management->section5) }}</textarea>
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
    CKEDITOR.replace('section_2');
    CKEDITOR.replace('section_3');
    CKEDITOR.replace('section_4');
    CKEDITOR.replace('section_5');
</script>
<script src="{{ asset('public/backend/js/common.js') }}"></script>
@endsection