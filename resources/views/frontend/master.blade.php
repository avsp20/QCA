<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'QCA') }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('public/frontend/img/favicon.ico') }}" width="16"/>
    @include('frontend.layouts.head')
    @yield('css')
    @yield('style')
</head>

<body>
    <div class="master-wrapper-content">
        @php $section_class = ''; @endphp
        @if(request()->segment(1) == 'cost-management' || request()->segment(1) == 'cost-drafting')
            @php $section_class = 'alternative-costs-resolution'; @endphp
        @endif
        <div class="page {{ $section_class }}">
            <!-- header section starts here -->
            @include('frontend.layouts.header')
            <!-- header section ends here -->
            @include('frontend.layouts.banner')
            <!-- our services section starts here -->
            @yield('content')
            <!-- our services section starts here -->

            <!-- footer section starts here -->
            @include('frontend.layouts.footer')
            <!-- footer section starts here -->
        </div>
    </div>
    @include('frontend.layouts.script')
    @yield('script')
</body>
</html>
