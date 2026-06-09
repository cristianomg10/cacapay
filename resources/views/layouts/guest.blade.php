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
<body class="bg-light d-flex flex-column align-items-center justify-content-center min-vh-100 py-5">
    <div class="text-center mb-4">
        <a href="/" class="text-decoration-none">
            <h1 class="h3 fw-bold text-primary">{{ config('app.name', 'Laravel') }}</h1>
        </a>
    </div>
    <div class="card shadow" style="max-width: 450px; width: 100%;">
        <div class="card-body p-4">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
