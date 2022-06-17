@extends('frontend.master')
@section('content')
<!-- banner slider section ends here -->
    <div class="centered-division">
        <div class="container">
            <div class="title d-inline-block">
                <strong>QCA Group™ - Contact Us</strong>
            </div>
            @if(!empty($contact_us))
                <!-- email table start -->
                <div class="email-table table-responsive">
                    @if($contact_us != null)
                        @if(($contact_us->enquiries_email != null) || ($contact_us->general_information_and_administration_email != null) || ($contact_us->privacy_email != null) || ($contact_us->it_email != null) || ($contact_us->legal_email != null))
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    @if($contact_us->enquiries_email != null)
                                        <tr>
                                            <td width="75%">
                                                <span class="fw-semi-bolder"> Enquiries</span>
                                            </td>
                                            <td width="25%">
                                                <a href="mailto:{{ $contact_us->enquiries_email }}" class="text-blue fw-semi-bold">
                                                    {{ $contact_us->enquiries_email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($contact_us->general_information_and_administration_email != null)
                                        <tr>
                                            <td width="75%">
                                                <span class="fw-semi-bolder"> General Information & Administration</span>
                                            </td>
                                            <td width="25%">
                                                <a href="mailto:{{ $contact_us->general_information_and_administration_email }}" class="text-blue fw-semi-bold">
                                                    {{ $contact_us->general_information_and_administration_email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($contact_us->privacy_email != null)
                                        <tr>
                                            <td width="75%">
                                                <span class="fw-semi-bolder"> Privacy</span>
                                            </td>
                                            <td width="25%">
                                                <a href="mailto:{{ $contact_us->privacy_email }}" class="text-blue fw-semi-bold">
                                                    {{ $contact_us->privacy_email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($contact_us->it_email != null)
                                        <tr>
                                            <td width="75%">
                                                <span class="fw-semi-bolder"> IT</span>
                                            </td>
                                            <td width="25%">
                                                <a href="mailto:{{ $contact_us->it_email }}" class="text-blue fw-semi-bold">
                                                    {{ $contact_us->it_email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($contact_us->legal_email != null)
                                        <tr>
                                            <td width="75%">
                                                <span class="fw-semi-bolder"> Legal</span>
                                            </td>
                                            <td width="25%">
                                                <a href="mailto:{{ $contact_us->legal_email }}" class="text-blue fw-semi-bold">
                                                    {{ $contact_us->legal_email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <!-- email table ends -->

                <!-- visit table starts  -->
                <div class="visit-table table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th colspan="2">Visit Us</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <tr>
                                <td width="32%" class="ps-md-0 bg-transparent border-bottom-0" valign="top">
                                    @if($contact_us->address != null)
                                        <p class="fw-semi-bolder mb-4">
                                            {{ $contact_us->address }}
                                        </p>
                                    @endif
                                    @if($contact_us->contact != null)
                                        <p class="mb-4">
                                            <a href="tel:+ 61 2 9241 4166">
                                                <i class="fas fa-phone-alt me-1 text-blue font-20 align-middle"></i>
                                                <span class="fw-semi-bolder align-middle">
                                                    {{ $contact_us->contact }}
                                                </span>
                                            </a>
                                        </p>
                                    @endif
                                    @if($contact_us->email != null)
                                        <p class="mb-4">
                                            <a href="mailto:info@qcacosts.com">
                                                <i class="far fa-envelope me-1 text-blue font-20 align-middle"></i>
                                                <span class="fw-semi-bolder align-middle">
                                                    {{ $contact_us->email }}
                                                </span>
                                            </a>
                                        </p>
                                    @endif
                                    @if($contact_us->website != null)
                                        <p class="mb-4">
                                            <a href="http://www.qcacosts.com/">
                                                <i class="fas fa-globe fa-fw me-1 text-blue font-20 align-middle"></i>
                                                <span class="fw-semi-bolder align-middle">
                                                    {{ $contact_us->website }}
                                                </span>
                                            </a>
                                        </p>
                                    @endif
                                    @if($contact_us->other_details != null)
                                        <p class="fw-semi-bolder mb-2">
                                            {{ $contact_us->other_details }}
                                        </p>
                                    @endif
                                </td>
                                <td width="67%" class="bg-transparent border-bottom-0 pe-0 mb-0" valign="top">
                                    @if($contact_us->map != null)
                                        <div class="iframe-body">
                                            <iframe src="{{ $contact_us->map }}" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- visit table ends  -->

                <!-- telephone table starts -->
                <div class="tele-table table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th colspan="2">Telephone</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @if($contact_us->phone != null)
                                <tr>
                                    <td width="75%">
                                        <span class="fw-semi-bolder"> Enquiries / General / Overseas Callers</span>
                                    </td>
                                    <td width="25%">
                                        <a href="tel:+ 61 2 9241 4166" class="text-blue fw-semi-bold">
                                            {{ $contact_us->phone }}
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- telephone table ends -->

                <!-- company-details table starts -->
                <div class="comp-detail-table table-responsive">
                    <table class="table custom-table mb-0">
                        <thead>
                            <tr>
                                <th colspan="2">Company Details</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @if($contact_us->registered_company != null)
                                <tr>
                                    <td width="70%">
                                        <span class="fw-semi-bolder">Registered Company</span>
                                    </td>
                                    <td width="30%">
                                        <span class="text-blue fw-semi-bold">
                                            {{ $contact_us->registered_company }}
                                        </span>
                                    </td>
                                </tr>
                            @endif
                            @if($contact_us->acn != null)
                                <tr>
                                    <td width="70%">
                                        <span class="fw-semi-bolder">ACN</span>
                                    </td>
                                    <td width="30%">
                                        <span class="text-blue fw-semi-bold">
                                            {{ $contact_us->acn }}
                                        </span>
                                    </td>
                                </tr>
                            @endif
                            @if($contact_us->abn != null)
                                <tr>
                                    <td width="70%">
                                        <span class="fw-semi-bolder">ABN</span>
                                    </td>
                                    <td width="30%">
                                        <span class="text-blue fw-semi-bold">
                                            {{ $contact_us->abn }}
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- company-details table ends -->
            @else
                <div class="email-table table-responsive">
                    <table class="table custom-table">
                        <tbody class="border-top-0">
                            <tr>
                                <td width="100%" align="center">
                                    We'll provide our contact details soon.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

