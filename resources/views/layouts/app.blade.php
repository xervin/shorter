<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shorter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ Vite::asset('resources/img/shorter_logo.svg') }}">
    @vite(['resources/css/app.scss'])
</head>
<body>
<x-header></x-header>
<main>
    <section class="info-bar">
        @yield('info')
    </section>
    <section class="content">
        @yield('content')
    </section>
</main>
<x-footer></x-footer>
@vite(['resources/js/app.js'])
</body>
</html>
