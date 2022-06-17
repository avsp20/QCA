@extends('frontend.master')
@section('content')
<!-- qca group section starts -->
    @if(!empty($cms) && isset($cms))
        <section class="qca-group-section">
            <div class="container">
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $cms->name }}</strong>
                </div>
                <div class="description-body desc-format">
                    {!! $cms->content !!}
                </div>
            </div>
        </section>
    @endif
<!-- qca group section ends -->
@endsection

