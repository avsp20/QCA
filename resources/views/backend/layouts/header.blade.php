<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light">

	<!-- Header with logos -->
	<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
		<div class="navbar-brand navbar-brand-md nav-header-logo">
			<a href="{{ route('admin.dashboard') }}" class="d-inline-block">
				<img src="{{ asset('public/frontend/img/logo-footer.png') }}" alt="">
			</a>
		</div>

		<div class="navbar-brand navbar-brand-xs">
			<a href="{{ route('admin.dashboard') }}" class="d-inline-block">
				<img src="{{ asset('public/frontend/img/logo-footer.png') }}" alt="">
			</a>
		</div>
	</div>
	<!-- /header with logos -->


	<!-- Mobile controls -->
	<div class="d-flex flex-1 d-md-none">
		<div class="navbar-brand mr-auto">
			<a href="{{ route('admin.dashboard') }}" class="d-inline-block">
				<img src="{{ asset('public/backend/images/logo_dark.png') }}" alt="">
			</a>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>

		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>
	<!-- /mobile controls -->


	<!-- Navbar content -->
	<div class="collapse navbar-collapse justify-content-between" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>
		<!-- <span class="badge bg-pink-400 badge-pill ml-md-3 mr-md-auto">16 orders</span> -->

		<ul class="navbar-nav">
			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					@if(Auth::guard('admin')->check())
					<span class="avatar-image">

						<img src="{{ asset('public/backend/images/profiles').'/'.Auth::guard('admin')->user()->user_image}}" class="mr-2" alt="">
					</span>
                    @else
                    <span class="avatar-image">
                        <img src="{{ asset('public/backend/images/placeholders/placeholder.jpg') }}"  alt="">
                    </span>
					<span>{{ ucfirst(Auth::guard('admin')->user()->user_fname) }} {{ ucfirst(Auth::guard('admin')->user()->user_lname) }}</span>
                    @endif
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<!-- <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> -->
					<a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
					<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
				</div>
			</li>
		</ul>
	</div>
	<!-- /navbar content -->
</div>
<!-- /main navbar -->