<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@stack('page-title') - {{ config('app.name', 'Laravel') }}</title>

    @stack('css')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/libs/fontawesome/css/all.css')}}">

    <!-- Styles -->
    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/custom.css?v=12654') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.partial.header')
    <main class="container mt-4">
        @yield('content')
</main>

    @include('layouts.partial.footer')
    <script src="{{asset('assets/libs/jquery/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
    @stack('js')
</body>

</html>