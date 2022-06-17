@extends('frontend.master')
@section('css')
<style type="text/css">
	.section2 p{
		color: #fff;
	}
	.section3 p{
		color: var(--text-light-black) !important;
	}
</style>
@endsection
@section('content')
	<!-- our services section starts here -->
	<section class="our-services">
	    <div class="container-lg">
	        <div class="row justify-content-between">
	        	@if(!empty($main_page) && $home_page_settings != null)
		            <div class="col-xl-3 col-12">
		            	@if($home_page_settings->section1_heading != null)
			                <div class="title">
			                    <strong>{{ $home_page_settings->section1_heading }}</strong>
			                </div>
		                <div class="description">
		                    <strong class="text-blue font-16">{{ $home_page_settings->section1_sub_heading }}</strong>
		                    {!! $home_page_settings->section1 !!}
		                </div>
		                @endif
		            </div>
	            @endif
	            @if(!empty($main_page) && $home_page_settings != null)
	            <div class="col-xl-8 col-12">
	                <div class="service-img-block">
	                    <div class="row">
	                    	@if($home_page_settings->advice_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-md-2 px-0 mb-md-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->advice_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->advice_image) }}" alt="Advice-services" class="w-100">
	                                    <span class="service-title">Advices</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->drafting_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-sm-2 px-0 mb-md-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->drafting_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->drafting_image) }}" alt="Drafting-services"
	                                        class="w-100">
	                                    <span class="service-title">Drafting</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->settlement_conference_team_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-md-2 px-0 mb-sm-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->settlement_conference_team_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->settlement_conference_team_image) }}"
	                                        alt="Settlement Conference team" class="w-100">
	                                    <span class="service-title">Settlement Conference team</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->court_appearances_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-sm-2 px-0 mb-sm-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->court_appearances_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->court_appearances_image) }}" alt="Court Appearances copy"
	                                        class="w-100">
	                                    <span class="service-title">Court Appearances</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                    </div>
	                    <div class="row mt-md-3 mt-2">
	                    	@if($home_page_settings->expert_report_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-md-2 px-0 mb-md-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->expert_reports_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->expert_report_image) }}" alt="Expert Reports" class="w-100">
	                                    <span class="service-title">Expert Reports</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->alternative_costs_resolution_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-sm-2 px-0 mb-md-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->alternative_costs_resolution_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->alternative_costs_resolution_image) }}" alt="Alternative
	                            Costs Resolution" class="w-100">
	                                    <span class="service-title">Alternative
	                                        Costs Resolution</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->cle_seminars_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-md-2 px-0 mb-sm-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->cle_seminars_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->cle_seminars_image) }}" alt="CLE Seminars" class="w-100">
	                                    <span class="service-title">CLE Seminars</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                        @if($home_page_settings->instructions_forms_image != null)
	                        <div class="col-md-3 col-sm-6 col-12 px-sm-2 px-0 mb-sm-0 mb-2 pe-0">
	                            <div class="service">
	                                <a href="{{ $home_page_settings->instruction_forms_link }}" class="d-block">
	                                    <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->instructions_forms_image) }}" alt="Instruction" class="w-100">
	                                    <span class="service-title">Instruction Forms</span>
	                                </a>
	                            </div>
	                        </div>
	                        @endif
	                    </div>

	                </div>
	            </div>
	            @endif
	        </div>
	    </div>
	</section>
	<!-- our services section starts here -->

	<div class="myqna-section">
	    <div class="container-lg">
	    	@if(!empty($main_page) && $home_page_settings != null)
	        <div class="row align-items-center flex-column">
	            <div class="title title-center">
	                <strong class="text-white text-capitalize">{{ $home_page_settings->section2_heading }}</strong>
	            </div>
	            <div class="description section2 text-center">
	                <p class="text-white">
	                    {!! $home_page_settings->section2 !!}
	                </p>
	            </div>
	            <div class="button text-center">
	                <a href="{{ $home_page_settings->section2_button_link }}" class="btn border-btn">{{ $home_page_settings->section2_button_name }}</a>
	            </div>
	        </div>
	        @endif
	    </div>
	</div>

	<!-- our office section starts here -->
	<section class="our-office-section">
		@if(!empty($main_page) && $home_page_settings != null)
	    <div class="container-lg">
	        <div class="title text-center pb-0">
	            <strong>{{ $home_page_settings->section3_heading }}</strong>
	        </div>
	        <div class="description section3 text-center">
	            <p class="text-light-black">{!! $home_page_settings->section3 !!}</p>
	        </div>
	        <div class="our-offie-body position-relative text-center mt-5">
	            <img src="{{ asset('public/backend/images/cms_pages/'.$home_page_settings->section3_image) }}" alt="office-bg-image" class="img-fluid">
	            <div class="address-block">
	            	@if($home_page_settings->text1 != null)
	                <div class="address-city">
	                    <strong class="text-uppercase">{{ $home_page_settings->text1 }}</strong>
	                </div>
	                @endif
	                @if($home_page_settings->text2 != null)
	                <div class="address fw-light">
	                    {{ $home_page_settings->text2 }}
	                </div>
	                @endif
	                @if($home_page_settings->text3 != null)
	                <div class="telephone fw-light">
	                    <a href="tel:+ 61 2 9241 4166">
	                        <i class="fas fa-phone-alt me-3 text-yellow"></i>
	                        <span>
	                            {{ $home_page_settings->text3 }}
	                        </span>
	                    </a>
	                </div>
	                @endif
	                @if($home_page_settings->text4 != null)
	                <div class="email mt-3 fw-light">
	                    <a href="mailto:info@qcacosts.com">
	                        <i class="far fa-envelope me-3 text-yellow"></i>
	                        <span>
	                            {{ $home_page_settings->text4 }}
	                        </span>
	                    </a>
	                </div>
	                @endif
	            </div>
	        </div>
	    </div>
	    @endif
	</section>
<!-- our office section starts here -->
@endsection

