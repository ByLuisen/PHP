<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Gwent') }}</title>

    <!-- CDN imports -->
    @yield('CDNs')

    {{-- Archivo CSS general --}}
    <link rel="stylesheet" href="{{ asset('css\custom.css') }}">

    <!-- Bootstrap -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- css dependiendo de la página -->
    @yield('estilos')
</head>

<body>
    <div id="app">
        <header>
            @include('partials.menu')
        </header>

        <main>
            @yield('content')
        </main>

        <!-- footer -->
        @yield('footer')
    </div>

    {{-- Archivos Javascript --}}

    @yield('scripts')
</body>

</html>
