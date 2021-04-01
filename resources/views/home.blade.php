<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/libs/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>

    <div id="app">
        <mainapp></mainapp>
    </div>
    
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
