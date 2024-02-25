<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/body.css') }}">

    <!-- Bootstrap 5 (CSS y JS) -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container">
        <header class="d-flex">
            <a href="https://www.proven.cat"><img src="/img/vet.png" alt="vet.png" width="50px" height="50px"></a>
            <h1>Clínica Veterinaria</h1> <!-- HEADER: PICTURE AND TITLE -->
        </header>
        @include('partials.mascotas')
        {{-- content --}}
        @yield('content')
    </div>
</body>

</html>
