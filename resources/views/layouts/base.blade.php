<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ url('favicon.png') }}">

    <title>{{ config('app.name', 'OneRead') }}</title>
    @livewireStyles
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <x-meta />
</head>

<body class="font-sans antialiased body" x-data="{ loginmodal: false }">
    @yield('content')
    <!-- Styles -->
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" data-turbolinks-suppress-warning></script>
</body>

</html>