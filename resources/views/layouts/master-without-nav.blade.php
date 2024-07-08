<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="semibox" data-topbar="light" data-sidebar="light"
    data-sidebar-size="lg" data-layout-mode="light" data-body-image="none" data-preloader="enable"
    data-sidebar-visibility="show" data-layout-style="default" data-layout-width="fluid"
    data-layout-position="scrollable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/esd_favicon.png') }}">
    @include('layouts.head-css')
</head>

@yield('body')

@yield('content')

@include('layouts.vendor-scripts')
</body>

</html>
