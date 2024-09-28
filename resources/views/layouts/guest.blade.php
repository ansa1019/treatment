<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Drug Decision Helper') }}</title>
    <link rel="icon" href="{{ url('logo.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="max-vw-100 min-h-screen flex flex-col lg:flex-row justify-center items-center pt-1 bg-gray-100">
        <div class="h-30 w-30 lg:h-50 lg:w-50 m-3" id="loginLogo">
            <x-application-logo class="fill-current text-gray-500" />
        </div>

        <div class="w-full h-auto sm:max-w-md m-3 px-4 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
