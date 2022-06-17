@extends('frontend.dashboard.master')
@section('content')
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> View QNA</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('user.qna.update',[$qna->id]) }}" method="POST" class="form-horizontal form-bordered">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Subject</label>
                                <div class="col-md-9">
                                    <label class="form-control">{{ $qna->qna_subject }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Jurisdiction</label>
                                <div class="col-md-9">
                                    <label class="form-control">{{ $qna->qna_jurisdiction }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date Entered</label>
                                <div class="col-md-9">
                                    <label class="form-control">{{ isset($qna->qna_question_date) ? \Carbon\Carbon::parse($qna->qna_question_date)->format('jS F, Y H:i:s') : '-' }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Questions</label>
                                <div class="col-md-9">
                                    {!! $qna->qna_question !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date Answered</label>
                                <div class="col-md-9">
                                    <label class="form-control">{{ isset($qna->qna_answer_date) ? \Carbon\Carbon::parse($qna->qna_answer_date)->format('jS F, Y H:i:s') : '-' }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Answer</label>
                                <div class="col-md-9">
                                    {!! $qna->qna_answer !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-2">
                                    <div class="radio-list">
                                        <label class="mb-0 mr-10">
                                            <input class="d-inline-block align-middle mt-0" type="radio" name="qna_favorite" value="1" {{ ($qna->qna_favorites != null) ? "checked" : "" }}>
                                            <span class="d-inline-block align-middle">Yes</span>
                                        </label>

                                        <label class="mb-0">
                                            <input class="d-inline-block align-middle mt-0" type="radio" name="qna_favorite" value="0" {{ ($qna->qna_favorites == null) ? "checked" : "" }}>
                                            <span class="d-inline-block align-middle">No</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <label class="mb-0">Do you want to add this QNA to your Favourite?</label>
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