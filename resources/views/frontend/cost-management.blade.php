@extends('frontend.master')
@section('css')
<style type="text/css">
    .section2 p {
        color: #fff;
    }
    .section2 ul li {
        color: #fff;
    }
</style>
@endsection
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section cost-manage">
        <div class="container">
            @if(!empty($main_page) && $cost_management != null)
                <div class="title d-inline-block">
                    <strong>{{ $cost_management->section1_heading }}</strong>
                </div>
                <div class="description-body fw-semi-bold">
                    {!! $cost_management->section1 !!}
                    @if($cost_management->section1_text1 != null)
                        <p class="cost-manage-p">
                            <a href="#tab_1" class="text-blue fw-semi-bolder">{{ $cost_management->section1_text1 }}</a>
                        </p>
                    @endif
                    @if($cost_management->section1_text2 != null)
                        <p class="cost-manage-p">
                            <a href="#tab_2" class="text-blue fw-semi-bolder">{{ $cost_management->section1_text2 }}</a>
                        </p>
                    @endif
                    @if($cost_management->section1_text3 != null)
                        <p class="cost-manage-p">
                            <a href="#tab_3" class="text-blue fw-semi-bolder">{{ $cost_management->section1_text3 }}</a>
                        </p>
                    @endif
                    @if($cost_management->section1_text4 != null)
                        <p class="cost-manage-p">
                            <a href="#tab_4" class="text-blue fw-semi-bolder">{{ $cost_management->section1_text4 }}</a>
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->

<!-- legal-cost-consultants section starts -->
    <section class="legal-cost-consultants-section full-width-section" id="tab_1">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($main_page) && $cost_management != null)
                <div class="col-lg-6 col-12 px-0 cost-consultants-left with-image-left pay-cost-left">
                    <img src="{{ asset('public/backend/images/cms_pages/'.$cost_management->section2_image) }}" alt="legal-cost-consultants" class="img-fluid h-100">
                </div>
                @endif
                @if(!empty($main_page) && $cost_management != null)
                <div
                    class="col-lg-6 col-12 cost-consultants-right with-image-right d-flex align-items-lg-center align-items-start flex-column">
                    <div class="title align-self-start white-title">
                        <strong class="text-white">{{ $cost_management->section2_heading }}</strong>
                    </div>
                    <div class="description-body section2">
                        {!! $cost_management->section2 !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
<!-- legal-cost-consultants section ends -->

    <section class="use-qca-section assessments" id="tab_2">
        <div class="container-lg">
            @if(!empty($main_page) && $cost_management != null)
            <div class="title d-inline-block">
                <strong>{{ $cost_management->section3_heading }}</strong>
            </div>
            <div class="description-body fw-semi-bold">
                {!! $cost_management->section3 !!}
            </div>
            @endif
            @if(!empty($main_page) && $cost_management != null)
            <div class="best-practice-section position-relative p-0" id="tab_3">
                @if($cost_management->section4_image != null)
                    <img src="{{ asset('public/backend/images/cms_pages/'.$cost_management->section4_image) }}" alt="best-practice"   class="img-fluid best-practice-image">
                @endif
                <div class="best-practice-left recover-cost">
                    <div class="title d-inline-block white-title">
                        <strong class="text-white">{{ $cost_management->section4_heading }}</strong>
                    </div>
                    <div class="description-body section2">
                        {!! $cost_management->section4 !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <section class="best-practice-section mt-0 cost-mbp" id="tab_4">
        <div class="container">
            @if(!empty($main_page) && $cost_management != null)
            <div class="title d-inline-block pe-md-5">
                <strong>{{ $cost_management->section5_heading }}</strong>
            </div>
            <div class="description-body fw-semi-bold">
                {!! $cost_management->section5 !!}
            </div>
            @endif
        </div>
    </section>
@endsection

