@extends('frontend.master')
@section('css')
<style type="text/css">
    .section2 p{
        color: #fff;
    }
    .section2 ul li {
        color: #fff;
    }
</style>
@endsection
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            @if(!empty($main_page) && $alternative_costs_resolution != null)
                <div class="title d-inline-block">
                    <strong>{{ $alternative_costs_resolution->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $alternative_costs_resolution->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->

<!-- legal-cost-consultants section starts -->
    <section class="legal-cost-consultants-section full-width-section">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($main_page) && $alternative_costs_resolution != null)
                <div class="col-lg-6 col-12 px-0 cost-consultants-left with-image-left">
                    @if($alternative_costs_resolution->section2_image != null)
                        <img src="{{ asset('public/backend/images/cms_pages/'.$alternative_costs_resolution->section2_image) }}" alt="legal-cost-consultants" class="img-fluid h-100">
                    @endif
                </div>
                <div
                    class="col-lg-6 col-12 cost-consultants-right with-image-right d-flex align-items-lg-center align-items-start flex-column">
                    <div class="title align-self-start white-title">
                        <strong class="text-white">{{ $alternative_costs_resolution->section2_heading }}</strong>
                    </div>
                    <div class="description-body section2">
                        {!! $alternative_costs_resolution->section2 !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
<!-- legal-cost-consultants section ends -->

    <section class="acr-section">

        <div class="acr-application-from">
            <div class="container">
                <div class="description-body">
                    @if(!empty($main_page) && $alternative_costs_resolution != null)
                        {!! $alternative_costs_resolution->section3 !!}
                        <a href="#" class="fw-bold text-blue  d-inline-block acr-form-btn">
                            <a href="{{ $alternative_costs_resolution->text1_url }}" target="_new"><span class="d-inline-block align-middle font-20">{{ $alternative_costs_resolution->text1 }}</span>
                            <span class="d-inline-block align-middle ms-3">
                                <img src="{{ asset('public/frontend/img/right-arrow.png') }}" alt="right-arrow">
                            </span></a>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

