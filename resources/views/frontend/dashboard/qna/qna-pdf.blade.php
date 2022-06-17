<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900");
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

    body {
        font-family: "Roboto";
    }
    .table-pdf{
        margin-bottom: 20px;
    }
</style>

<body>
    @if(count($qna) > 0)
    	@foreach($qna as $qnas)
		    <table class="table-pdf" width="100%" cellpadding="0" cellspacing="0" border="0">
		        <tbody>
		            <tr>
		                <td>
		                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
		                        style="font-size: 13px; font-family: 'Roboto';border: 1px solid rgba(0,0,0,.125);color: #333;background-color: #fff;">
		                        <tbody>
		                            <tr>
		                                <td>
		                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
		                                        style="padding: 20px 20px 0;">
		                                        <tbody>
		                                            <tr>
		                                                <td width="50%">
		                                                    <b>
		                                                        <i class="bi bi-exclamation-circle-fill"
		                                                            style="margin-right: 15px;"></i>
		                                                        Subject: {{ $qnas->qna_subject }}
		                                                    </b>
		                                                </td>
		                                                <td width="50%" style="text-align: right;">
		                                                    Jurisdiction: {{ $qnas->qna_jurisdiction }}
		                                                </td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td style="padding: 0 20px;">
		                                    <h6 style="margin: 0; margin-top: 20px;margin-bottom: 15px; font-size: 15px;">
		                                        Question date:
		                                        {{ isset($qnas->qna_question_date) ? \Carbon\Carbon::parse($qnas->qna_question_date)->format('d/m/y') : '' }}</h6>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td style="padding: 0 20px;">
		                                    {!! $qnas->qna_question !!}
		                                </td>
		                            </tr>
		                            <tr>
		                                <td>
		                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
		                                        style="padding: 20px;border-top: 1px solid rgba(0,0,0,.125);">
		                                        <tbody>
		                                            <tr>
		                                                <td>
		                                                    <h6
		                                                        style="margin: 0;margin-bottom: 15px; font-size: 15px;font-weight: 400;">
		                                                        Answer date:
		                                                        {{ isset($qnas->qna_answer_date) ? \Carbon\Carbon::parse($qnas->qna_answer_date)->format('d/m/y') : '' }} </h6>
		                                                    <p style="margin: 0;">
		                                                        @if($qnas->qna_answer != null)
																	{!! $qnas->qna_answer !!}
																@else
																	<span>No answer given.</span>
																@endif
		                                                    </p>
		                                                </td>
		                                            </tr>
		                                        </tbody>
		                                    </table>
		                                </td>
		                            </tr>
		                        </tbody>
		                    </table>
		                </td>
		            </tr>
		        </tbody>
		    </table>
		@endforeach
	@endif
</body>
</html>
{{--<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
  	.btn-icon {
    	display: none;
  	}
</style>
</head>
<body>
	<div class="content" id="qna_bulk">
    	<div class="mb-3">
			<h6 class="mb-2 font-weight-semibold">
				<span>{{ ucfirst($qna->user_company) }} - {{ $qna->user_location }}</span>
				<span class="text-muted d-block">{{ ucfirst($qna->user_fname) }} {{ ucfirst($qna->user_lname) }}</span>
				<span class="text-muted d-block">{{ ucfirst($qna->user_email) }}</span>
				<span class="text-muted d-block">{{ ucfirst($qna->user_contact_main) }}</span>
				<span class="text-muted d-block">{{ ucfirst($qna->user_contact_mobile) }}</span>
			</h6>
			<button class="btn bg-slate btn-icon" id="print_qna" type="button" onclick="window.print();"><i class="icon-printer2"></i>  Print</button>
			<button class="btn bg-slate btn-icon ml-1" id="download_qna" type="button"><i class="icon-file-download"></i>  Download</button>
		</div>
    	@if(count($qna->qna) > 0)
    		@foreach($qna->qna as $qnas)
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
</body>
</html>--}}