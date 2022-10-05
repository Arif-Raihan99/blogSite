<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('layouts.backend.includes.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('layouts.backend.includes.header')
        @if(Auth::user()->role == 'user')
        @else
            @include('layouts.backend.includes.menu')
        @endif
        <div class="content-wrapper">
            @yield('body')
        </div>
        @include('layouts.backend.includes.footer')
    </div>
    @include('layouts.backend.includes.js')
</body>
</html>

