<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Default Title')</title>

        <link rel="stylesheet" href="{{ asset('dist/assets/laravel.min.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
</html>
