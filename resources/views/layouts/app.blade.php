<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    @if (View::hasSection('header'))
    <div class="bg-white shadow-sm border-bottom">
        <div class="container py-3">
            @yield('header')
        </div>
    </div>
    @endif

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
