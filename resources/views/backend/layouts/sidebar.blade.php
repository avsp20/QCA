<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="mr-3">
                        <a href="{{ route('admin.dashboard') }}" class="avatar-image">
                            @if(Auth::guard('admin')->check())
                                <img src="{{ asset('public/backend/images/profiles').'/'.Auth::guard('admin')->user()->user_image}}"  alt="">
                            @else
                                <img src="{{ asset('public/backend/images/placeholders/placeholder.jpg') }}"   alt="">
                            @endif
                        </a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold mb-0">@if(Auth::guard('admin')->check()) {{ ucfirst(Auth::guard('admin')->user()->user_fname) }} {{ ucfirst(Auth::guard('admin')->user()->user_lname) }} @endif</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Front Settings</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{ route('admin.home-page-settings.index') }}" class="nav-link @if(request()->segment(2) == 'home-page-settings'){{"active"}}@endif">
                        <i class="icon-stack"></i>
                        <span>Pages</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu @if(request()->segment(2) == 'home' || request()->segment(2) == 'advices' || request()->segment(2) == 'court-appearances' || request()->segment(2) == 'expert-reports' || request()->segment(2) == 'cle-seminars' || request()->segment(2) == 'instruction-forms' || request()->segment(2) == 'qca-legal' || request()->segment(2) == 'cost-management' || request()->segment(2) == 'costs-drafting' || request()->segment(2) == 'settlement-conference-team' || request()->segment(2) == 'alternative-costs-resolution' || request()->segment(2) == 'contact-us' || request()->segment(2) == 'about-us'){{"nav-item-expanded nav-item-open"}}@endif">
                    <a href="#" class="nav-link"><i class="icon-cog3"></i> <span>Page Settings</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            <a href="{{ route('admin.home') }}" class="nav-link @if(request()->segment(2) == 'home'){{"active"}}@endif">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.about-us') }}" class="nav-link @if(request()->segment(2) == 'about-us'){{"active"}}@endif">
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.advices') }}" class="nav-link @if(request()->segment(2) == 'advices'){{"active"}}@endif">
                                <span>Advices</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.cost-management') }}" class="nav-link @if(request()->segment(2) == 'cost-management'){{"active"}}@endif">
                                <span>Cost Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.cost-drafting') }}" class="nav-link @if(request()->segment(2) == 'costs-drafting'){{"active"}}@endif">
                                <span>Cost Drafting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settlement-conference-team') }}" class="nav-link @if(request()->segment(2) == 'settlement-conference-team'){{"active"}}@endif">
                                <span>Settlement Conference Team</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.court-appearances') }}" class="nav-link @if(request()->segment(2) == 'court-appearances'){{"active"}}@endif">
                                <span>Court Appearances</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.expert-reports') }}" class="nav-link @if(request()->segment(2) == 'expert-reports'){{"active"}}@endif">
                                <span>Expert Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.alternative-costs-resolution') }}" class="nav-link @if(request()->segment(2) == 'alternative-costs-resolution'){{"active"}}@endif">
                                <span>Alternative Costs Resolution</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.cle-seminars') }}" class="nav-link @if(request()->segment(2) == 'cle-seminars'){{"active"}}@endif">
                                <span>CLE Seminars</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.instruction-forms') }}" class="nav-link @if(request()->segment(2) == 'instruction-forms'){{"active"}}@endif">
                                <span>Instruction Forms</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.qca-legal') }}" class="nav-link @if(request()->segment(2) == 'qca-legal'){{"active"}}@endif">
                                <span>QCA Legal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contact-us.index') }}" class="nav-link @if(request()->segment(2) == 'contact-us'){{"active"}}@endif">
                                <i class="icon-address-book3"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cms.index') }}" class="nav-link @if(request()->segment(2) == 'cms'){{"active"}}@endif">
                        <i class="icon-stack"></i>
                        <span>CMS</span>
                    </a>
                </li>
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(request()->segment(2) == 'dashboard'){{"active"}}@endif">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->segment(2) == 'users'){{"active"}}@endif">
                        <i class="icon-users4"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.qna.index') }}" class="nav-link @if(request()->segment(2) == 'qna'){{"active"}}@endif">
                        <i class="icon-question7"></i>
                        <span>QNA</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->