@extends('backend.master')
@section('css')
<style type="text/css">
	@media print {
	  	body * {
	    	visibility: hidden;
	  	}
	  	#qna_bulk, #qna_bulk * {
	    	visibility: visible;
	  	}
	  	#qna_bulk {
	    	position: absolute;
	    	left: 0;
	    	top: 0;
	  	}
	  	.btn-icon {
	    	display: none;
	  	}
	}
</style>
@endsection
@section('content')
<!-- Content area -->
    <div class="content" id="qna_bulk">
    	<div class="mb-3">
			<h6 class="mb-2 font-weight-semibold">
				<span>{{ ucfirst($user->user_company) }} - {{ $user->user_location }}</span>
				<span class="text-muted d-block">{{ ucfirst($user->user_fname) }} {{ ucfirst($user->user_lname) }}</span>
				<span class="text-muted d-block">{{ ucfirst($user->user_email) }}</span>
				<span class="text-muted d-block">{{ ucfirst($user->user_contact_main) }}</span>
				<span class="text-muted d-block">{{ ucfirst($user->user_contact_mobile) }}</span>
			</h6>
			<button class="btn bg-slate btn-icon" id="print_qna" type="button" onclick="window.print();"><i class="icon-printer2"></i>  Print</button>
			<a class="btn bg-slate btn-icon ml-1" id="download_qna" href="{{ route('admin.user-qna-download',[$user->id, request()->qna_id]) }}"><i class="icon-file-download"></i>  Download</a>
		</div>
    	@if(count($qna) > 0)
    		@foreach($qna as $qnas)
		        <div class="card">
					<div class="card-header d-sm-flex justify-content-sm-between align-items-sm-center">
						<div>
							<i class="icon-question4 mr-2"></i><strong>Subject: {{ $qnas->qna_subject }}</strong>
						</div>
						<div class="mt-1 mt-sm-0">Jurisdiction: {{ $qnas->qna_jurisdiction }}</div>
					</div>

					<div class="card-body">
						<h6 class="card-title">Question date: {{ isset($qnas->qna_question_date) ? \Carbon\Carbon::parse($qnas->qna_question_date)->format('d/m/y') : '' }}</h6>
						{!! $qnas->qna_question !!}
					</div>

					<div class="card-body">
						<h6 class="card-title">Answer date: {{ isset($qnas->qna_answer_date) ? \Carbon\Carbon::parse($qnas->qna_answer_date)->format('d/m/y') : '' }}</h6>
						@if($qnas->qna_answer != null)
							{!! $qnas->qna_answer !!}
						@else
							<span>No answer given.</span>
						@endif
					</div>
				</div>
			@endforeach
		@endif
    </div>
<!-- /content area -->
@endsection