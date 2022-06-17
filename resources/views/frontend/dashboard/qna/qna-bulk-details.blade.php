@extends('frontend.dashboard.master')
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
<div class="row" id="qna_bulk">
    @if(count($qna) > 0)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-default btn-outline m-b-20 m-r-10 btn-icon" id="blockbtn3" onclick="window.print();">Print</a>
            <a class="btn btn-default btn-outline m-b-20 btn-icon" id="unblockbtn3" href="{{ route('user.qna-download',[request()->id]) }}">Download</a>
            @foreach($qna as $qn)
                <div class="panel panel-default block3">
                    <div class="panel-heading">
                       <strong>
                        <i class="icon-question"></i>
                           Subject: {{ $qn->qna_subject }}
                       </strong>
                        <div class="panel-action">
                            Jurisdiction: {{ $qn->qna_jurisdiction }}
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <h6 class="card-title">Question date: {{ isset($qn->qna_question_date) ? \Carbon\Carbon::parse($qn->qna_question_date)->format('d/m/y') : '' }}</h6>
                        <div class="panel-body">
                            {!! $qn->qna_question !!}
                        </div>
                        <h6 class="card-title">Answer date: {{ isset($qn->qna_answer_date) ? \Carbon\Carbon::parse($qn->qna_answer_date)->format('d/m/y') : '' }}</h6>
                        <div class="panel-body">
                            @if($qn->qna_answer != null)
                                {!! $qn->qna_answer !!}
                            @else
                                <span>No answer given.</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection