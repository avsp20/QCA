@extends('backend.master')
@section('content')
<!-- Content area -->
    <div class="content">
        <!-- Horizontal form options -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Answer QNA</h5>
                        </div>
                        <form method="POST" action="{{ route('admin.qna.update',[$qna->id]) }}">
                        @csrf
                        @method('PUT')
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="24%">User Details</td>
                                            <td>
                                                @if($qna->user != null)
                                                    {{ ucfirst($qna->user->user_company) }} - {{ $qna->user->user_location }}<br>
                                                    {{ ucfirst($qna->user->user_fname) }} {{ ucfirst($qna->user->user_lname) }}<br>
                                                    {{ $qna->user->user_email }}<br>
                                                    {{ $qna->user->user_contact_main }}<br>
                                                    {{ $qna->user->user_contact_mobile }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="24%">Subject</td>
                                            <td>{{ $qna->qna_subject }}</td>
                                        </tr>
                                        <tr>
                                            <td width="24%">Jurisdiction</td>
                                            <td>{{ $qna->qna_jurisdiction }}</td>
                                        </tr>
                                        <tr>
                                            <td width="24%">Date Entered</td>
                                            <td>{{ $qna->qna_question_date }}</td>
                                        </tr>
                                        <tr>
                                            <td width="24%">Questions</td>
                                            <td>{!! $qna->qna_question !!}</td>
                                        </tr>
                                        <tr>
                                            <td width="24%">Answer <span class="text-danger">*</span></td>
                                            <td>
                                                <textarea class="form-control" rows="10" name="answer" id="answer">{!! $qna->qna_answer !!}</textarea>
                                                <span class="text-danger">{{ $errors->first('answer') }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body border-0">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Save <i class="icon-arrow-right14 ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form method="POST" action="{{ route('admin.edit-qna-options',[$qna->id]) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="public_view" id="view_yes" value="1" {{ ($qna->qna_available_to_others == 1) ? "checked" : "" }}>
                                            <label class="custom-control-label" for="view_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="public_view" id="view_no" value="0" {{ ($qna->qna_available_to_others == 0) ? "checked" : "" }}>
                                            <label class="custom-control-label" for="view_no">No</label>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('public_view') }}</span>
                                    </div>
                                    <label class="col-lg-4 col-form-label">Can this QNA be viewed by other members?</label>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="qna_favorite" id="fav_yes" value="1" {{ ($qna->qna_favorites != null) ? "checked" : "" }}>
                                            <label class="custom-control-label" for="fav_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="qna_favorite" id="fav_no" value="0" {{ ($qna->qna_favorites == null) ? "checked" : "" }}>
                                            <label class="custom-control-label" for="fav_no">No</label>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('qna_favorite') }}</span>
                                    </div>
                                    <label class="col-lg-4 col-form-label">Do you want to add this QNA to your Favourite?</label>
                                </div>
                                <div class="text-right">
                                    <a href="{{ route('admin.qna.index') }}" class="btn btn-light"><i class="icon-arrow-left13"></i> Cancel</a>
                                    <button type="submit" class="btn btn-success">Save <i class="icon-arrow-right14 ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
    </div>
    <!-- test -->
<!-- /content area -->
@endsection
@section('script')
<script type="text/javascript">
    CKEDITOR.replace('answer');
</script>
@endsection
