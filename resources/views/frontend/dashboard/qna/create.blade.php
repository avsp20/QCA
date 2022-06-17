@extends('frontend.dashboard.master')
@section('content')
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Add Question</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('user.qna.store') }}" method="POST" class="form-horizontal form-bordered">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Subject <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="subject" placeholder="Enter Subject" class="form-control" value="{{ old('subject') }}">
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jurisdiction <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="jurisdiction">
                                        <option value="">Select Jurisdiction</option>
                                        @if(count($jurisdictions) > 0)
                                            @foreach($jurisdictions as $jurisdiction)
                                                <option value="{{ $jurisdiction }}" {{ (old('jurisdiction') == $jurisdiction) ? "selected" : "" }}>{{ $jurisdiction }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger">{{ $errors->first('jurisdiction') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Questions <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="question" id="question" rows="6" cols="80">{{ old('question') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('question') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                            <a href="{{ route('user.qna.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--./row-->
@endsection
@section('script')
<script>
    CKEDITOR.replace('question');
</script>
@endsection