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
		<button class="btn bg-slate btn-icon" id="print_qna" type="button" onclick="window.print();"><i class="icon-printer2"></i>  Print</button>
		<a class="btn bg-slate btn-icon ml-1" id="download_qna" href="{{ route('admin.qna-download',[request()->id]) }}"><i class="icon-file-download"></i>  Download</a>
	</div>
	@if(count($qna) > 0)
		@foreach($qna as $qn)
			<div class="card">
				<div class="card-header d-sm-flex justify-content-sm-between align-items-sm-center">
					<div>
						<i class="icon-question4 mr-2"></i><strong>Subject: {{ $qn->qna_subject }}</strong>
					</div>
					<div class="mt-1 mt-sm-0">Jurisdiction: {{ $qn->qna_jurisdiction }}</div>
				</div>

				<div class="card-body">
					<h6 class="card-title">Question date: {{ isset($qn->qna_question_date) ? \Carbon\Carbon::parse($qn->qna_question_date)->format('d/m/y') : '' }}</h6>
					{!! $qn->qna_question !!}
				</div>

				<div class="card-body">
					<h6 class="card-title">Answer date: {{ isset($qn->qna_answer_date) ? \Carbon\Carbon::parse($qn->qna_answer_date)->format('d/m/y') : '' }}</h6>
					@if($qn->qna_answer != null)
						{!! $qn->qna_answer !!}
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