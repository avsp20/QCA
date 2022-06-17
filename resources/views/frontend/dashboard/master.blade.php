<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'QCA') }}</title>
    @include('frontend.dashboard.layouts.head')
    @yield('css')
    @yield('style')
</head>
<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    @if(request()->segment(1) == 'login' || request()->segment(1) == 'register' || request()->segment(1) == 'password' || request()->segment(2) == 'verify-user')
        <section id="wrapper" class="login-register @if(request()->segment(1) == 'register'){{ "signup-page" }}@endif">
            @yield('content')
        </section>
    @else
        <div id="wrapper">
            <div class="preloader">
                <div class="cssload-speeding-wheel"></div>
            </div>
            @include('frontend.dashboard.layouts.header')
            @include('frontend.dashboard.layouts.sidebar')
            <!-- ===== Page-Content ===== -->
            <div class="page-wrapper">
                <!-- ===== Page-Container ===== -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- ===== Page-Container-End ===== -->
                @include('frontend.dashboard.layouts.footer')
            </div>
            <!-- ===== Page-Content-End ===== -->
        </div>
    @endif
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    @include('frontend.dashboard.layouts.script')
    @yield('script')
</body>
</html>
