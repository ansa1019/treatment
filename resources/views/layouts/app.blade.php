<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Drug Decision Helper') }}</title>
    <link rel="icon" href="{{ url('logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/ddbe078107.js" crossorigin="anonymous"></script>
    <script src="{{ Vite::asset('resources/js/index.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-secondary hidden sm:block p-0 fixed">
        @include('layouts.sidebar')
    </div>
    <div class="container-fluid min-h-screen w-full bg-gray-100 flex-nowrap">
        <div class="col w-full p-0">
            <!-- Navigation -->
            @include('layouts.navigation')

            <!-- Page Content -->
            <div class="row h-full p-sm-2 p-md-3 p-xl-4 m-0 p-0">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
