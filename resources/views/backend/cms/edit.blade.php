@extends('backend.master')
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
                        <form action="{{ route('admin.cms.update', [$cms->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('backend.cms.form')
                            <div class="form-group">
                                <label>Content: <span class="text-danger">*</span></label>
                                <textarea rows="5" class="form-control" name="content">{!! old('content',$cms->content) !!}</textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('admin.cms.index') }}" class="btn btn-light"><i class="icon-arrow-left13"></i> Cancel</a>
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
    CKEDITOR.replace('content');
</script>
@endsection