@extends('frontend.master')
@section('css')
<style type="text/css">
    .section2 p{
        color: #fff;
    }
</style>
@endsection
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            @if(!empty($main_page) && $settlement_conference_team != null)
                <div class="title d-inline-block">
                    <strong>{{ $settlement_conference_team->section1_heading }}</strong>
                </div>
                <div class="description-body">
                    {!! $settlement_conference_team->section1 !!}
                </div>
            @endif
        </div>
    </section>
<!-- qca group section ends -->

<!-- why use qca section starts -->
    <section class="use-qca-section pt-0">
        <div class="container">
            <div class="best-practice-section position-relative sc-bt">
                @if(!empty($main_page) && $settlement_conference_team != null)
                    @if($settlement_conference_team->section2_image != null)
                        <img src="{{ asset('public/backend/images/cms_pages/'.$settlement_conference_team->section2_image) }}" alt="best-practice" class="img-fluid best-practice-image">
                    @endif
                    <div class="best-practice-left">
                        <div class="title d-inline-block white-title">
                            <strong class="text-white">{{ $settlement_conference_team->section2_heading }}</strong>
                        </div>
                        <div class="description-body section2">
                            {!! $settlement_conference_team->section2 !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
<!-- why use qca section starts -->
@endsection

