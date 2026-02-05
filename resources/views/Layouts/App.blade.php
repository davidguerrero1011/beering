<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Include Compiled Styles --}}
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resources/navbar.css') }}">

    
    {{-- Font google --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap Library --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    {{-- Notyf Library --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    {{-- Add External Libraries --}}
    @stack('style-libs')

    {{-- Personalices Styles --}}
    @stack('style-app')

</head>
<body>

    {{-- Add home's menu --}}
    @auth
        @include('Resources.Navbar')
    @endauth


    {{-- Se incluye el contenido de manera dinamica --}}
    @yield('content')

    {{-- Jquery Library --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Bootstrap Js Library --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Sweet Alert Library --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Axios CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Notyf Library Script --}}
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    {{-- Custom Scripts --}}
    <script src="{{ asset('js/resources/navbar.js') }}"></script>
    <script src="{{ asset('js/home/home.js') }}"></script>

    @stack('scripts')
    @stack('graph-colors')
</body>
</html>