===== Left-Sidebar ===== -->
    <aside class="sidebar">
        <div class="scroll-sidebar">
            <div class="user-profile">
                <div class="dropdown user-pro-body">
                    <div class="profile-image">
                        <img src="{{ asset('public/frontend/img/users/hanna.jpg') }}" alt="user-img" class="img-circle">
                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-danger">
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                            <!-- <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li>
                                <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <p class="profile-text m-t-15 font-16">
                        @if(Auth::check())
                            <a href="javascript:void(0);">{{ Auth::user()->user_fname }} {{ Auth::user()->user_lname }}</a>
                        @endif
                    </p>
                </div>
            </div>
            <nav class="sidebar-nav">
                <ul id="side-menu">
                    <li>
                        <a class="waves-effect go-back" href="{{ route('front.home') }}" aria-expanded="false"><i class="icon-arrow-left-circle fa-fw"></i> <span class="hide-menu"> Back To Home </span></a>
                    </li>
                    <li class="@if(request()->segment(2) == 'dashboard') {{ "active" }} @endif">
                        <a class="waves-effect" href="{{ route('user.dashboard') }}" aria-expanded="false"><i class=" icon-home fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                    </li>
                    <li>
                        <a class="@if(request()->segment(2) == 'qna' || request()->segment(2) == 'all-qna') {{ "active" }} @endif waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-grid fa-fw"></i> <span class="hide-menu"> QNA</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('user.qna.index') }}">Personal</a></li>
                            <li><a href="{{ route('user.qna-all.index') }}">All</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<!-- ===== Left-Sidebar-End =====