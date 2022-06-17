<!-- header section starts here -->
    <header class="header">
        <div class="container-lg">
            <div class="row header-upper align-items-center justify-content-between">

                <div class="logo w-auto w-auto order-0">
                    <a href="{{ route('front.home') }}" class="d-block">
                        <img src="{{ asset('public/frontend/img/logo.png') }}" alt="logo" class="img-fluid">
                    </a>
                </div>
                <div class="qna-button w-auto order-md-2 order-1 anchor-dis">
                    @if(Auth::check())
                        @if(Auth::user()->user_is_approved == 1)
                            <a href="{{ route('user.dashboard') }}">
                                MyQnA Dashboard
                            </a>
                        @else
                            <li class="nav-item dropdown" style="list-style: none;">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    MyQnA
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endif
                    @else
                        <a href="{{ route('user.login') }}">
                            MyQnA
                        </a>
                    @endif
                </div>

            </div>

        </div>
        <div class="container-lg ps-lg-0 header-lower">
            <div class=" d-flex align-items-center justify-content-between">
                <nav class="navbar navbar-expand-xl">
                    <div class="container-fluid ps-0">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation" id="burger">
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                        </button>
                        <span class="overlay" id="overlay"></span>
                        <div class="navbar-collapse" id="menu">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center ">
                                <li class=" nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('front.home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.advices') }}">Advices</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Drafting
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('front.cost-management') }}">Costs
                                                Management</a></li>
                                        <li><a class="dropdown-item" href="{{ route('front.cost-drafting') }}">Costs
                                                Drafting</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.settlement-conference-team') }}" tabindex="-1"
                                        aria-disabled="true">Settlement
                                        Conference Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.court-appearances') }}" tabindex="-1" aria-disabled="true">Court
                                        Appearances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.expert-reports') }}" tabindex="-1" aria-disabled="true">Expert
                                        Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.alternative-costs-resolution') }}" tabindex="-1"
                                        aria-disabled="true">Alternative
                                        Cost
                                        Resolution </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.cle-seminars') }}" tabindex="-1" aria-disabled="true">CLE
                                        Seminars</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('front.instruction-forms') }}" role="button" aria-expanded="false">Instruction Forms</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="http://www.qcacosts.com/new_instns.php" target="_new">Insurer</a></li>
                                        <li><a class="dropdown-item" href="http://www.qcacosts.com/new_drafting.php" target="_new2">All Other</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="get-in-touch-btn">
                    <a href="{{ route('front.contact-us') }}">
                        get in touch
                    </a>
                </div>
            </div>
        </div>
    </header>
<!-- header section ends here -->