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
                        <h5 class="card-title">Home Page Settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store-page-settings',[@$main_page->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Page: <span class="text-danger">*</span></label>
                                <select class="form-control form-control-select2" id="page_name" data-fouc name="page">
                                    @if(count($pages) > 0)
                                        @foreach($pages as $key => $page)
                                            @if($key == 'home')
                                                <option value="{{ $key }}" {{ ($key == old('page',@$main_page->page)) ? "selected" : "" }}>{{ $page }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('page') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter home page title" value="{{ old('title', @$main_page->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Short Description:</label>
                                <input type="text" name="short_description" class="form-control" placeholder="Enter short description" value="{{ old('short_description', @$main_page->short_description) }}">
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Banner Image Upload:</label>
                                <input type="file" id="banner_image" name="banner_image[]" class="file-input" multiple="" data-fouc>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section1 Heading:</label>
                                        <input type="text" name="section1_heading" class="form-control" placeholder="Enter home page section1 heading" value="{{ old('section1_heading', @$home_page_settings->section1_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section1 Sub Heading:</label>
                                        <input type="text" name="section1_sub_heading" class="form-control" placeholder="Enter home page section1 sub heading" value="{{ old('section1_sub_heading', @$home_page_settings->section1_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section1:</label>
                                <textarea rows="5" name="section_1" class="form-control" id="section_1">{{ old('section1', @$home_page_settings->section1) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Advice Image:</label>
                                        <input type="file" class="form-input-styled" name="advice_image" data-fouc onchange="readURL(this,'advice')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->advice_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->advice_image) }}" alt="advice_image" id="advice_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="advice_image" id="advice_image" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Drafting Image:</label>
                                        <input type="file" class="form-input-styled" name="drafting_image" data-fouc onchange="readURL(this,'drafting')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->drafting_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->drafting_image) }}" alt="drafting_image" id="drafting_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="drafting_image" id="drafting_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Advices Link:</label>
                                        <input type="text" name="advice_link" class="form-control" placeholder="Enter home page advice link" value="{{ old('advice_link', @$home_page_settings->advice_link) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Drafting Link:</label>
                                        <input type="text" name="drafting_link" class="form-control" placeholder="Enter home page drafting link" value="{{ old('drafting_link', @$home_page_settings->drafting_link) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Settelement Conference Team Image:</label>
                                        <input type="file" class="form-input-styled" name="settlement_conference_team_image" data-fouc onchange="readURL(this,'settlement_conference')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->settlement_conference_team_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->settlement_conference_team_image) }}" alt="settlement_conference_team_image" id="settlement_conference_team_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="settlement_conference_team_image" id="settlement_conference_team_image" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Court Appearances Images:</label>
                                        <input type="file" class="form-input-styled" name="court_appearances_image" data-fouc onchange="readURL(this,'court_appearances')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->court_appearances_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->court_appearances_image) }}" alt="court_appearances_image" id="court_appearances_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="court_appearances_image" id="court_appearances_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Settlement Conference Team Link:</label>
                                        <input type="text" name="settlement_conference_team_link" class="form-control" placeholder="Enter home page settlement conference team link" value="{{ old('settlement_conference_team_link', @$home_page_settings->settlement_conference_team_link) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Court Appearances Link:</label>
                                        <input type="text" name="court_appearances_link" class="form-control" placeholder="Enter home page court appearances link" value="{{ old('court_appearances_link', @$home_page_settings->court_appearances_link) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Exper Reports Image:</label>
                                        <input type="file" class="form-input-styled" name="expert_report_image" data-fouc onchange="readURL(this,'expert_report')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->expert_report_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->expert_report_image) }}" alt="expert_report_image" id="expert_report_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="expert_report_image" id="expert_report_image" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Alternative Costs Resolution Image:</label>
                                        <input type="file" class="form-input-styled" name="alternative_costs_resolution_image" data-fouc onchange="readURL(this,'alternative_costs')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->alternative_costs_resolution_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->alternative_costs_resolution_image) }}" alt="alternative_costs_resolution_image" id="alternative_costs_resolution_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="alternative_costs_resolution_image" id="alternative_costs_resolution_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Expert Reports Link:</label>
                                        <input type="text" name="expert_reports_link" class="form-control" placeholder="Enter home page expert reports link" value="{{ old('expert_reports_link', @$home_page_settings->expert_reports_link) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Alternative Costs Resolution Link:</label>
                                        <input type="text" name="alternative_costs_resolution_link" class="form-control" placeholder="Enter home page alternative costs resolution link" value="{{ old('alternative_costs_resolution_link', @$home_page_settings->alternative_costs_resolution_link) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>CLE Seminars Image:</label>
                                        <input type="file" class="form-input-styled" name="cle_seminars_image" data-fouc onchange="readURL(this,'cle_seminars')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->cle_seminars_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->cle_seminars_image) }}" alt="cle_seminars_image" id="cle_seminars_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="cle_seminars_image" id="cle_seminars_image" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Instructions Image:</label>
                                        <input type="file" class="form-input-styled" name="instructions_forms_image" data-fouc onchange="readURL(this,'instructions_forms')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->instructions_forms_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->instructions_forms_image) }}" alt="instructions_forms_image" id="instructions_forms_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="instructions_forms_image" id="instructions_forms_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CLE Seminars Link:</label>
                                        <input type="text" name="cle_seminars_link" class="form-control" placeholder="Enter home page cle seminars link" value="{{ old('cle_seminars_link', @$home_page_settings->cle_seminars_link) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Instruction Forms Link:</label>
                                        <input type="text" name="instruction_forms_link" class="form-control" placeholder="Enter home page instruction forms link" value="{{ old('instruction_forms_link', @$home_page_settings->instruction_forms_link) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section2 Heading:</label>
                                        <input type="text" name="section2_heading" class="form-control" placeholder="Enter home page section2 heading" value="{{ old('section2_heading', @$home_page_settings->section2_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section2 Sub Heading:</label>
                                        <input type="text" name="section2_sub_heading" class="form-control" placeholder="Enter home page section2 sub heading" value="{{ old('section2_sub_heading', @$home_page_settings->section2_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section2:</label>
                                <textarea rows="5" name="section_2" class="form-control" id="section_2">{{ old('section2', @$home_page_settings->section2) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section2 Button Name:</label>
                                        <input type="text" name="section2_button_name" class="form-control" placeholder="Enter home page section2 button name" value="{{ old('section2_button_name', @$home_page_settings->section2_button_name) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section2 Button Link:</label>
                                        <input type="text" name="section2_button_link" class="form-control" placeholder="Enter home page section2 button link" value="{{ old('section2_button_link', @$home_page_settings->section2_button_link) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Section3 Heading:</label>
                                        <input type="text" name="section3_heading" class="form-control" placeholder="Enter home page section3 heading" value="{{ old('section3_heading', @$home_page_settings->section3_heading) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Section3 Sub Heading:</label>
                                        <input type="text" name="section3_sub_heading" class="form-control" placeholder="Enter home page section3_sub_heading" value="{{ old('section3 sub heading', @$home_page_settings->section3_sub_heading) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Section3:</label>
                                <textarea rows="5" name="section_3" class="form-control" id="section_3">{{ old('section3', @$home_page_settings->section3) }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Section3 Image:</label>
                                        <input type="file" class="form-input-styled" id="section_3_image" name="section_3_image" data-fouc onchange="readURL(this,'section3_image')">
                                    </div>
                                    <div class="col-md-2">
                                        @if(@$home_page_settings->section3_image != null)
                                            <img src="{{ asset('public/backend/images/cms_pages/'.@$home_page_settings->section3_image) }}" alt="section3_image" id="section3_image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('public/backend/images/pages/no-image-available.png') }}" alt="section3_image" id="section3_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Text1:</label>
                                        <input type="text" name="text1" class="form-control" placeholder="Enter home page text1" value="{{ old('text1', @$home_page_settings->text1) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Text2:</label>
                                        <input type="text" name="text2" class="form-control" placeholder="Enter home page text2" value="{{ old('text2', @$home_page_settings->text2) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Text3:</label>
                                        <input type="text" name="text3" class="form-control" placeholder="Enter home page text3" value="{{ old('text3', @$home_page_settings->text3) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Text4:</label>
                                        <input type="text" name="text4" class="form-control" placeholder="Enter home page text4" value="{{ old('text4', @$home_page_settings->text4) }}">
                                    </div>
                                </div>
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
    $("#banner_image").fileinput({
        initialPreview: [{!!@$banner_data!!}],
        initialPreviewAsData: true,
        initialPreviewConfig:{!!@$image_key!!},
        deleteUrl: "{{ route('admin.delete-banner') }}",
        ajaxDeleteSettings: {
            type: 'GET'
        },
        overwriteInitial: false,
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus"></i>',
        removeIcon: '<i class="icon-cross3"></i>',
        maxFileCount: 100,
        allowedFileExtensions: ["jpg", "png"],
        fileActionSettings: {
            removeIcon: '<i class="icon-bin"></i>',
            removeClass: 'btn btn-link btn-xs btn-icon',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                main1: "{preview}\n" +
                "<div class='input-group {class}'>\n" +
                "   <div class='input-group-btn'>\n" +
                "       {browse}\n" +
                "   </div>\n" +
                "   {caption}\n" +
                "   <div class='input-group-btn'>\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                "   </div>\n" +
                "</div>"
            },
            // uploadClass: 'btn btn-link btn-xs btn-icon',
            indicatorNew: '<i class="icon-file-plus text-slate"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
        }
        });
</script>
<script src="{{ asset('public/backend/js/pages/home.js') }}"></script>
@endsection