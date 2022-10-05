<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.frontend.includes.css')
</head>
<body>

@include('layouts.frontend.includes.header')
@include('layouts.frontend.includes.menu')

<div class=""></div>

@yield('body')

<div class="py-1"></div>

@include('layouts.frontend.includes.footer')
@include('layouts.frontend.includes.js')

</body>
</html>
