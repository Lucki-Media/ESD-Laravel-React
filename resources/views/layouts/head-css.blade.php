@yield('css')
<!-- Layout config Js -->
<script src="{{ URL::asset('build/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('build/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<style>
.description__class h1{
    font-size:26px !important;
}
.description__class h2{
    font-size:20px !important;
}
.description__class h3{
    font-size:16px !important;
}
.description__class h4{
    font-size:14px !important;
}
.description__class h5{
    font-size:12px !important;
}
.description__class h6{
    font-size:10px !important;
}

</style>
{{-- @yield('css') --}}
