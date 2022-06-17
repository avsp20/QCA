@php
  use App\Http\Controllers\Frontend\CommonController as Common;
  $cms = Common::cms();
@endphp
<!-- footer section starts here -->
    <footer class="text-white">
        <div class="container-lg">
            <div class="row justify-content-between footer-upper">
                <div class="col-md-4 text-center mt-4 fw-light">
                    <div class="logo">
                        <a href="{{ route('front.home') }}" class="d-block">
                            <img src="{{ asset('public/frontend/img/logo-footer.png') }}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-md-start text-center address-wrapper">
                    <div class="address-block text-md-start text-center fw-light">
                        <div class="address-city">
                            <strong class="text-uppercase">sydney</strong>
                        </div>
                        <div class="address">
                            Quantum Cost Assessors Pty Ltd
                            Level 23, 52 Martin Place <br>
                            Sydney NSW 2000, Australia
                        </div>
                        <div class="telephone">
                            <a href="tel:+ 61 2 9241 4166">
                                <i class="fas fa-phone-alt me-3 text-yellow"></i>
                                <span>
                                    + 61 2 9241 4166
                                </span>
                            </a>
                        </div>
                        <div class="email mt-3">
                            <a href="mailto:info@qcacosts.com">
                                <i class="far fa-envelope me-3 text-yellow"></i>
                                <span>
                                    info@qcacosts.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-md-start text-center fw-light">
                    <ul class="quick-links list-group ">
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.home') }}">
                                Home
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.about-us') }}">
                                About Us
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.cost-management') }}">
                                Costs Management
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.cost-drafting') }}">
                                Costs Drafting
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.settlement-conference-team') }}">
                                Settlement Conference Team
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.alternative-costs-resolution') }}">
                                Alternative Cost Resolution
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.qca-legal') }}">
                                QCA Legal
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{ route('front.contact-us') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-lower text-center">
                <p class="fw-light mb-1">
                    © Copyright 2002 - 2021 Quantum Cost Assessors Pty Limited - Legal Costing and Consulting
                </p>
                <p class="fw-light mb-1">
                    All Rights Reserved. Various Trademarks are held by their respective owners.
                </p>
                <ul class="fl-quick-links">
                    <li>
                        <a href="{{ route('front.rates') }}">Rates</a>
                    </li>
                    @if(count($cms) > 0)
                        @foreach($cms as $cm)
                            <li>
                                <a href="{{ route('front.'.$cm->slug) }}">{{ $cm->name }}</a>
                            </li>
                        @endforeach
                    @endif
                    <li>
                        <a href="{{ route('front.employment') }}">Employment</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
<!-- footer section starts here -->