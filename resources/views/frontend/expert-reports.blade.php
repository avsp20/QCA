@extends('frontend.master')
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            @if(!empty($main_page) && $expert_reports != null)
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $expert_reports->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $expert_reports->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->
@endsection

