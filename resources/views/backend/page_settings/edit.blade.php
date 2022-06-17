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
                        <h5 class="card-title">Edit Info</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.home-page-settings.update', [$page_setting->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('backend.page_settings.form')
                            <div class="form-group">
                                <label>Banner Image Upload:</label>
                                <input type="file" id="banner_image" name="banner_image" class="file-input" data-fouc>
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
@section('script')
<script type="text/javascript">
    var caption = '{{ $page_setting->banner_image }}';
    if(caption.length > 0){
        var image = base_public_url + 'pages/{!! $page_setting->banner_image !!}';
        var key = '{{ $page_setting->id }}';
        $("#banner_image").fileinput({
            initialPreview: [image],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                {caption: caption, downloadUrl: image, width: "120px", key: key}
            ],
            ajaxDeleteSettings: {
                type: 'GET' // This should override the ajax as $.ajax({ type: 'DELETE' })
            },
            deleteUrl: "{{ route('admin.delete-page-settings-image') }}",
            overwriteInitial: false,
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
                uploadIcon: '<i class="icon-upload"></i>',
                uploadClass: 'btn btn-link btn-xs btn-icon',
                indicatorNew: '<i class="icon-file-plus text-slate"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            }
        });
    }
</script>
@endsection