@extends('frontend.dashboard.master')
@section('content')
<!-- .row -->
<div class="row">
    <div class="col-md-12">
        @if(count($notifications) > 0)
            <div class="white-box">
                @foreach($notifications as $notification)
                    @if($notification->label == "QNA")
                        <a href="{{ route('user.qna.show',[$notification->qna_id]) }}"><div class="alert alert-info">{{ $notification->message }}</div></a>
                    @else
                        <div class="alert alert-success">{{ $notification->message }}</div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
<!-- .row -->
@endsection