<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OneRead') }}</title>
    @livewireStyles
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    @yield('content')
    <!-- Styles -->
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" data-turbolinks-suppress-warning></script>
</body>

</html>