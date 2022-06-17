@extends('backend.master')
@section('css')
<style type="text/css">
    .kv-file-download, .kv-file-zoom {
        display: none;
    }
</style>
@endsection
@section('content')
<!-- Content area -->
    <div class="content">
        @if (session('success'))
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <span class="font-weight-semibold">{{ session('success') }}</span>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <span class="font-weight-semibold">{{ session('error') }}</span>
        </div>
        @endif
        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Contact Us Settings</h5>
                    </div>

                    <div class="card-body">
                        @if(empty($contact_us))
                            @php
                                $route = route('admin.contact-us.store');
                            @endphp
                        @else
                            @php
                                $route = route('admin.contact-us.update', [$contact_us->id]);
                            @endphp
                        @endif
                        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($contact_us != null)
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label>Page: <span class="text-danger">*</span></label>
                                <select class="form-control form-control-select2" id="page_name" data-fouc name="page">
                                    @if(count($pages) > 0)
                                        @foreach($pages as $key => $page)
                                            @if($key == 'contact-us')
                                                <option value="{{ $key }}" {{ ($key == old('page',@$main_page->page)) ? "selected" : "" }}>{{ $page }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('page') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter advice page title" value="{{ old('title', @$main_page->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Short Description:</label>
                                <input type="text" name="short_description" class="form-control" placeholder="Enter short description" value="{{ old('short_description', @$main_page->short_description) }}">
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Banner Image Upload:</label>
                                <input type="file" id="banner_image" name="banner_image" class="file-input" data-fouc>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm"><i class="icon-file-text2 mr-2"></i>Email</legend>
                                <div class="form-group">
                                    <label>Enquiry:</label>
                                    <input type="text" name="enquiries_email" class="form-control" placeholder="Enter Enquiries Email" value="{{ (!empty($contact_us->enquiries_email)) ? $contact_us->enquiries_email : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>General Information & Administration:</label>
                                    <input type="text" name="general_information_and_administration_email" class="form-control" placeholder="Enter General Information & Administration email" value="{{ (!empty($contact_us->general_information_and_administration_email)) ? $contact_us->general_information_and_administration_email : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Privacy:</label>
                                    <input type="text" name="privacy_email" class="form-control" placeholder="Enter Privacy email" value="{{ (!empty($contact_us->privacy_email)) ? $contact_us->privacy_email : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>IT:</label>
                                    <input type="text" name="it_email" class="form-control" placeholder="Enter IT Email" value="{{ (!empty($contact_us->it_email)) ? $contact_us->it_email : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Legal:</label>
                                    <input type="text" name="legal_email" class="form-control" placeholder="Enter Legal Email" value="{{ (!empty($contact_us->legal_email)) ? $contact_us->legal_email : "" }}">
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm"><i class="icon-file-text2 mr-2"></i>Visit Us</legend>
                                <div class="form-group">
                                    <label>Address: <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ (!empty($contact_us->address)) ? $contact_us->address : "" }}">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Contact: <span class="text-danger">*</span></label>
                                    <input type="text" name="contact" class="form-control" placeholder="Enter Contact" value="{{ (!empty($contact_us->contact)) ? $contact_us->contact : "" }}">
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Email: <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ (!empty($contact_us->email)) ? $contact_us->email : "" }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Website:</label>
                                    <input type="text" name="website" class="form-control" placeholder="Enter Website" value="{{ (!empty($contact_us->website)) ? $contact_us->website : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Other Info:</label>
                                    <textarea rows="3" class="form-control" name="other_details" placeholder="Enter detaile here...">{{ (!empty($contact_us->other_details)) ? $contact_us->other_details : "" }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Embedded Map:</label>
                                    <input type="text" name="map" class="form-control" placeholder="Enter Embedded Map Iframe" value="{{ (!empty($contact_us->map)) ? $contact_us->map : "" }}">
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm"><i class="icon-file-text2 mr-2"></i>Telephone</legend>
                                <div class="form-group">
                                    <label>Enquiries / General / Overseas Callers:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ (!empty($contact_us->phone)) ? $contact_us->phone : "" }}">
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm"><i class="icon-file-text2 mr-2"></i>Company Details</legend>
                                <div class="form-group">
                                    <label>Registered Company:</label>
                                    <input type="text" name="registered_company" class="form-control" placeholder="Enter Registered Company" value="{{ (!empty($contact_us->registered_company)) ? $contact_us->registered_company : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>ACN:</label>
                                    <input type="text" name="acn" class="form-control" placeholder="Enter ACN" value="{{ (!empty($contact_us->acn)) ? $contact_us->acn : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>ABN:</label>
                                    <input type="text" name="abn" class="form-control" placeholder="Enter ABN" value="{{ (!empty($contact_us->abn)) ? $contact_us->abn : "" }}">
                                </div>
                            </fieldset>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Save <i class="icon-arrow-right14 ml-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
    </div>
<!-- /content area -->
@endsection
@section('script')
<script type="text/javascript">
    var caption = '{{ @$banner->banner_image }}';
    var image = base_public_url + 'pages/{!! @$banner->banner_image !!}';
    var key = '{{ @$banner->id }}';
    var deleteUrl = "{{ route('admin.delete-banner') }}";
</script>
<script src="{{ asset('public/backend/js/common.js') }}"></script>
@endsection