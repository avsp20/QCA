@php
  use App\Http\Controllers\Frontend\CommonController as Common;
  $front_settings = Common::frontBanners();
@endphp
<!-- homepage slider section starts here -->
@if(request()->segment(1) == 'home' || request()->segment(1) == null)
<section class="banner-section home-page-slider">
    <div class="home-page-slider-wrapper">
        <div class="full-width-slider">
        	@if(count($front_settings) > 0)
        		@foreach($front_settings as $front_setting)
                    @if($front_setting->page != null)
            			@if($front_setting->page->name == 'home')
    			            <div class="position-relative">
    			                <img src="{{ asset('public/backend/images/pages/'.$front_setting->banner_image) }}" alt="slider-1" class="img-fluid">
    			                <p class="slider-text">
    			                	{{ $front_setting->page->short_description }}
    			                </p>
    			            </div>
    		            @endif
                    @endif
	            @endforeach
            @endif
        </div>
    </div>
</section>
@else
<section class="banner-section">
    <div class="full-width-image banner-image">
        @if(count($front_settings) > 0)
    		@foreach($front_settings as $front_setting)
                @if($front_setting->page != null)
        			@if($front_setting->page->name == request()->segment(1))
                        @php $img = $front_setting->banner_image; @endphp
            			<img src="{{ asset('public/backend/images/pages/'.$img) }}" alt="slider-1" class="img-fluid">
    		            <div class="slider-text banner-text">
    			            <strong>{{ $front_setting->page->title }}</strong>
    			            <p class="banner-desc">
    			                {{ $front_setting->page->short_description }}
    			            </p>
    			        </div>
    	            @endif
                @endif
            @endforeach
        @endif
    </div>
    @if(request()->segment(1) != 'email' && request()->segment(2) != 'verify')
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    @endif
</section>
@endif
<!-- homepage slider section starts here -->