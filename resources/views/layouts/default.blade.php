<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @stack('css')
</head>
<body>
<div id="app">
    @yield('content')
</div>

@vite('resources/js/app.js')
@stack('js')
</body>
</html>