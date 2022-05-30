<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    {{--    <link href="/css/main.css" rel="stylesheet">--}}
</head>
<body>
@include('partials.header')
<div id="app">
    <main>
        @yield('content')
    </main>
</div>
@include('partials.footer')
<script src="{{ asset(mix('js/models/models.js')) }}"></script>
</body>
</html>
