<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'QCA') }}</title>
    @include('backend.layouts.head')
    @yield('css')
    @yield('style')
</head>

<body>
    @include('backend.layouts.header')
    <!-- Page content -->
    <div class="page-content">
        @include('backend.layouts.sidebar')
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            @php $route_name = ''; $page = ''; @endphp
            @if(request()->segment(2) == 'dashboard')
                @php $route_name = $page = 'Dashboard'; @endphp
            @elseif(request()->segment(2) == 'profile')
                @php $route_name = $page = 'Profile'; @endphp
            @elseif(request()->segment(2) == 'home-page-settings')
                @php $route_name = 'home-page-settings.index'; $page = 'Home Page Settings'; @endphp
            @elseif(request()->segment(2) == 'cms')
                @php $route_name = 'cms.index'; $page = 'CMS'; @endphp
            @endif
            <div class="page-header page-header-light">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            @if($page != null)
                                <span class="breadcrumb-item active">{{ $page }}</span>
                                {{--<a href="{{ route('admin.'.lcfirst($route_name)) }}" class="breadcrumb-item">{{ $page }}</a>--}}
                            @endif
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            @yield('content')
            @include('backend.layouts.footer')
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    @include('backend.layouts.script')
    @yield('script')
</body>
</html>