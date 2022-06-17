@extends('frontend.master')
@section('css')
<style type="text/css">
    .section2 p{
        color: #fff;
    }
</style>
@endsection
@section('content')
<!-- costs-drafting group section starts -->
    <section class="costs-drafting">
        <div class="container">
            @if(!empty($main_page) && $cost_drafting != null)
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $cost_drafting->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $cost_drafting->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- costs-drafting group section ends -->

<!-- legal-cost-consultants section starts -->
    <section class="legal-cost-consultants-section full-width-section">
        <div class="container-fluid">
            @if(!empty($main_page) && $cost_drafting != null)
                <div class="row">
                    <div class="col-lg-6 col-12 px-0 cost-consultants-left with-image-left need-more-help">
                        @if($cost_drafting->section2_image != null)
                            <img src="{{ asset('public/backend/images/cms_pages/'.$cost_drafting->section2_image) }}" alt="legal-cost-consultants"
                            class="img-fluid h-100">
                        @endif
                    </div>
                    <div
                        class="col-lg-6 col-12 cost-consultants-right with-image-right d-flex align-items-lg-center align-items-start flex-column">
                        <div class="title align-self-start white-title">
                            <strong class="text-white">{{ $cost_drafting->section2_heading }}</strong>
                        </div>
                        <div class="description-body section2">
                            {!! $cost_drafting->section2 !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
<!-- legal-cost-consultants section ends -->

    <section class="best-practice-section mt-0 cost-dbp">
        <div class="container">
            @if(!empty($main_page) && $cost_drafting != null)
                <div class="title d-inline-block pe-md-5">
                    <strong>{{ $cost_drafting->section3_heading }}</strong>
                </div>
                <div class="description-body fw-semi-bold">
                    {!! $cost_drafting->section3 !!}
                </div>
            @endif
        </div>
    </section>
@endsection

