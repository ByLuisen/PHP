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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Agrega los enlaces a Swiper aquí -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@4.5.0/dist/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css\custom.css') }}">

    <!--Scripts-->
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
    </div>
    <!-- footer -->
    @yield('footer')
</body>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="module" src="{{ asset('js\cartas.js') }}"></script>
<script type="module" src="{{ asset('js\script.js') }}"></script>

</html>
