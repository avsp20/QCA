@extends('frontend.master')
@section('css')
<style type="text/css">
	body{
		font-size: 15px;
	}
	.employment-form strong{
		font-size: 30px !important;
	}
	.captcha{
		text-align: center;
		border: none;
		font-weight: bold;
		font-size: 20px;
		font-family: "Modern";
		color: var(--theme-blue);
	}
</style>
@endsection
@section('content')
<!-- qca group section starts -->
    <section class="qca-group-section">
        <div class="container">
            <div class="title d-inline-block pe-md-5">
                <strong>Employment</strong>
            </div>
            <div class="description-body">
                <p>
                    At QCA we are always looking for experienced Costs Lawyers who are able to work to deadlines and are committed to providing high quality work. We are an equal opportunity employer, offer flexible working hours, a great working environment with an interesting variety of work at competitive levels of remuneration. If this is of interest you please complete the Employment Application Form on this page and submit this with your current curriculum vitae.
                </p>
                <p>ALL EMPLOYMENT APPLICATION FORMS ARE TREATED WITH THE STRICTEST CONFIDENCE</p>
            </div>
        </div>
    </section>
    <section class="qca-group-section pt-0">
        <div class="container">
            <div class="title employment-form d-inline-block pe-md-5">
                <strong>Employment Application Form</strong>
            </div>
            <div class="description-body">
				<form method="POST" action="{{ route('save-employment') }}" enctype="multipart/form-data">
					@csrf
					<fieldset>
  						<legend>Your contact details</legend>
					  	<!-- 2 column grid layout with text inputs for the first and last names -->
					  	<div class="row mb-md-4 mb-2">
						    <div class="col">
						      	<div class="form-outline">
					        		<label class="form-label">First name <span class="text-danger">*</span></label>
						        	<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" />
						        	<span class="text-danger">{{ $errors->first('first_name') }}</span>
						      	</div>
						    </div>
						    <div class="col">
						      	<div class="form-outline">
						        	<label class="form-label">Last name<span class="text-danger">*</span></label>
					        		<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" />
					        		<span class="text-danger">{{ $errors->first('last_name') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row mb-md-4 mb-2">
						    <div class="col">
						      	<div class="form-outline">
					        		<label class="form-label">Address<span class="text-danger">*</span></label>
						        	<input type="text" name="address" class="form-control" value="{{ old('address') }}" />
						        	<span class="text-danger">{{ $errors->first('address') }}</span>
						      	</div>
						    </div>
						    <div class="col">
						      	<div class="form-outline">
						        	<label class="form-label">Suburb<span class="text-danger">*</span></label>
					        		<input type="text" name="suburb" class="form-control" value="{{ old('suburb') }}" />
					        		<span class="text-danger">{{ $errors->first('suburb') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row mb-md-4 mb-2">
						    <div class="col">
						      	<div class="form-outline">
					        		<label class="form-label">State<span class="text-danger">*</span></label>
						        	<select name="state" class="form-control">
						        		@if(count($states) > 0)
						        			@foreach($states as $state)
						        				<option value="{{ $state }}" {{ (old('state') == $state) ? "selected" : "" }}>{{ $state }}</option>
						        			@endforeach
						        		@endif
						        	</select>
						        	<span class="text-danger">{{ $errors->first('state') }}</span>
						      	</div>
						    </div>
						    <div class="col">
						      	<div class="form-outline">
						        	<label class="form-label">Post Code<span class="text-danger">*</span></label>
					        		<input type="text" name="postcode" class="form-control" value="{{ old('postcode') }}" />
					        		<span class="text-danger">{{ $errors->first('postcode') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row mb-md-4 mb-2">
						    <div class="col-md-6">
						      	<div class="form-outline">
					        		<label class="form-label">Contact Phone<span class="text-danger">*</span></label>
						        	<input type="text" name="contact_no" class="form-control" value="{{ old('contact_no') }}" />
						        	<span class="text-danger">{{ $errors->first('contact_no') }}</span>
						      	</div>
						    </div>
						    <div class="col-md-6">
						      	<div class="form-outline">
					        		<label class="form-label mt-mb-4 mt-2">(please include area code)</label>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row mb-md-4 mb-2">
						    <div class="col-md-8">
						      	<div class="form-outline">
					        		<label class="form-label">Email<span class="text-danger">*</span></label>
						        	<input type="text" name="email" class="form-control" value="{{ old('email') }}" />
						        	<span class="text-danger">{{ $errors->first('email') }}</span>
						      	</div>
						    </div>
					  	</div>
	  					<!-- Submit button -->
					</fieldset>
					<hr>
					<fieldset>
  						<legend>Qualifications & Experience</legend>
					  	<!-- 2 column grid layout with text inputs for the first and last names -->
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
					        		<label class="form-label">Are you a Solicitor ? <span class="text-danger">*</span></label>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">

					        		<select name="is_solicitor" class="form-control">
					        			<option value="0">Please Select</option>
					        			<option value="2" {{ (old('is_solicitor') == 2) ? "selected" : "" }}>No</option>
					        			<option value="1" {{ (old('is_solicitor') == 1) ? "selected" : "" }}>Yes</option>
					        		</select>
					        		<span class="text-danger">{{ $errors->first('is_solicitor') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
					        		<label class="form-label">Year Admitted</label>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">

					        		<input type="text" name="year_admitted" class="form-control" value="{{ old('year_admitted') }}" />
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
					        		<label class="form-label">Do you have legal costs drafting experience ? <span class="text-danger">*</span></label>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">

					        		<select name="having_cost_draft_experience" class="form-control">
					        			<option value="0">Please Select</option>
					        			<option value="2" {{ (old('having_cost_draft_experience') == 2) ? "selected" : "" }}>No</option>
					        			<option value="1" {{ (old('having_cost_draft_experience') == 1) ? "selected" : "" }}>Yes</option>
					        		</select>
					        		<span class="text-danger">{{ $errors->first('having_cost_draft_experience') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
					        		<label class="form-label">How many years experience in legal costs drafting do you have <span class="text-danger">*</span></label>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">

					        		<select name="cost_draft_experience" class="form-control">
					        			<option value="1">less than 1</option>
					        			<option value="2" {{ (old('cost_draft_experience') == 1) ? "selected" : "" }}>1-2</option>
					        			<option value="3" {{ (old('cost_draft_experience') == 2) ? "selected" : "" }}>3-5</option>
					        			<option value="4" {{ (old('cost_draft_experience') == 3) ? "selected" : "" }}>6-10</option>
					        			<option value="5" {{ (old('cost_draft_experience') == 4) ? "selected" : "" }}>more than 10</option>
					        		</select>
					        		<span class="text-danger">{{ $errors->first('cost_draft_experience') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
					        		<label class="form-label">Which jurisdictions do you have legal costing experience in</label>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-6">
						      	<div class="form-outline">
					        		@if(count($states) > 0)
					        			@foreach($states as $key => $state)
				        					<div class="form-check form-check-inline">
												<input class="form-check-input" name="jurisdiction[]" type="checkbox" id="{{ $key }}" {{ (is_array(old('jurisdiction')) && in_array($key, old('jurisdiction'))) ? ' checked' : '' }} value="{{ $key }}">
												<label class="form-check-label" for="{{ $key }}">{{ $state }}</label>
											</div>
					        			@endforeach
					        		@endif
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-4">
						      	<div class="form-outline">
						      		<label class="form-label">Upload CV <small>(2Mb max of Ms Word .DOC -or- .PDF)</small></label>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">

						      		<input type="file" name="upload_file" class="form-control">
						      		<span class="text-danger">{{ $errors->first('upload_file') }}</span>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-8">
						      	<div class="form-outline">
						      		<label class="form-label">Additional Comments</label>
						      		<textarea rows="5" name="additional_comments" class="form-control">{{ old('additional_comments') }}</textarea>
						      	</div>
						    </div>
					  	</div>
					  	<div class="row align-items-center mb-3">
						    <div class="col-md-3">
						      	<div class="form-outline">
        							<!-- <div id="txtCaptcha" class="captcha"></div> -->
        							<div class="captcha-span">
	                          			<span>{!! captcha_img() !!}</span>
	                          		</div>
						      		<input type="text" id="captcha_code" name="captcha_code" class="form-control" />
						      		<span class="text-danger">{{ $errors->first('captcha_code') }}</span>
						      	</div>
						    </div>
						    <div class="col-md-4">
						      	<div class="form-outline">
        							<div class="mt-md-3 mt-2"></div>
        							<a href="javascript:void(0)" id="refresh-captcha" class="btn-refresh" title="refresh"><img src="{{ asset('public/frontend/img/refresh.jpg') }}"></a>
						      	</div>
						    </div>
					  	</div>
					</fieldset>
					<button type="submit" class="btn btn-primary btn-block mb-4 mt-4">Submit</button>
				</form>
            </div>
        </div>
    </section>
<!-- qca group section ends -->
@endsection
@section('script')
<script type="text/javascript">
$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'{{ route("refresh_captcha") }}',
     success:function(data){
        $(".captcha-span span").html(data.captcha);
     }
  });
});
</script>
@endsection
