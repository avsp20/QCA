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
    <section class="qca-group-section qca-about-us">
        <div class="container">
            @if(!empty($main_page) && $about_us != null)
            <div class="title d-inline-block">
                <strong>{{ $about_us->section1_heading }}</strong>
            </div>
            <div class="description-body">
                {!! $about_us->section1 !!}
            </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->

<!-- legal-cost-consultants section starts -->
    <section class="legal-cost-consultants-section full-width-section">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($main_page) && $about_us != null)
                    <div class="col-lg-6 col-12 px-0 cost-consultants-left with-image-left">
                        @if($about_us->section2_image != null)
                            <img src="{{ asset('public/backend/images/cms_pages/'.$about_us->section2_image) }}" alt="legal-cost-consultants"
                            class="img-fluid h-100">
                        @endif
                    </div>
                    <div
                        class="col-lg-6 col-12 cost-consultants-right with-image-right d-flex align-items-lg-center align-items-start flex-column">
                        <div class="title align-self-start white-title">
                            <strong class="text-white">{{ $about_us->section2_heading }}</strong>
                        </div>
                        <div class="description-body section2">
                            {!! $about_us->section2 !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
<!-- legal-cost-consultants section ends -->

<!-- why use qca section starts -->
    <section class="use-qca-section">
        <div class="container">
            @if(!empty($main_page) && $about_us != null)
                <div class="title d-inline-block">
                    <strong>{{ $about_us->section3_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $about_us->section3 !!}
                </div>
                <div class="best-practice-section position-relative sc-bt">
                    @if($about_us->section4_image != null)
                        <img src="{{ asset('public/backend/images/cms_pages/'.$about_us->section4_image) }}" alt="best-practice" class="img-fluid best-practice-image">
                    @endif
                    <div class="best-practice-left">
                        <div class="title d-inline-block white-title">
                            <strong class="text-white">{{ $about_us->section4_heading }}</strong>
                        </div>
                        <div class="description-body section2">
                            {!! $about_us->section4 !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
<!-- why use qca section starts -->
@endsection

