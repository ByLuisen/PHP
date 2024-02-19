@extends('layouts.app')

@section('estilos')
    <!-- Enlaces a tus estilos generales -->
    <link rel="stylesheet" href="{{ asset('css\cartas.css') }}">
@endsection

@section('content')
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong vh-100" data-bs-ride="carousel">
        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <video style="min-width: 100%; min-height: 100%" playsinline autoplay muted loop>
                    <source class="h-100" src="{{ asset('videos/amanece.mp4') }}" type="video/mp4" />
                </video>
                <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h1 class="mb-3">Anuel Amanece BRRRR!!!</h1>
                            <h5 class="mb-4">
                                REAL HASTA LA MUERTE
                            </h5>
                            <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=fg4ZY92w0L4"
                                role="button" rel="nofollow" target="_blank">RHLM</a>
                            <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=htmUyizijP4"
                                target="_blank" role="button">BRRRRRRR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion mostrar todas las cartas -->
    <section class="sectionCartas">
        <div class="content">
            <div class="info">
                <p>¡Únete a nosotros para una emocionante aventura llena de estrategia, intriga y diversión! Ya seas un
                    maestro en tácticas o estés empezando en el mundo de los juegos de cartas estratégicos, tenemos una
                    experiencia diseñada para todos los niveles de habilidad. Prepárate para sumergirte en batallas épicas,
                    donde cada movimiento cuenta y la astucia es clave para la victoria.</p>
                <button class="btn">Crear mazo</button>
            </div>
            <div class="swiper">
                <div id="wrapper1" class="swiper-wrapper">
                    @foreach ($datos as $valor)
                        <div class="swiper-slide"
                            style="background: linear-gradient(to top, #27270fa3, #203a4300, #2c536400), url('../images/{{ $valor }}.png') no-repeat 50% 50% / contain #D4AC30;">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </section>

    <!-- Sección UPC Team -->
    <section class="container-fluid"
        style="background: linear-gradient(180deg, #ff3caa 50%, #784ba0f4 100%, #2b85c5 100%); padding-top: 50px; padding-bottom: 50px;">

        <div>
            <!-- Título -->
            <h1 class="mt-1 text-center" style="color: white;"><b>HIPPO TEAM</b></h1>

            <!-- Paragrafo info de equipo -->
            <div class="container">
                <p class="mt-4" style="font-size: 1em; text-align: center; color: white;">
                    Somos un apasionado equipo de estudiantes dedicados al mundo del desarrollo de juegos. Con una
                    combinación única de creatividad, habilidades técnicas y determinación. Nuestro equipo está
                    comprometido con cada aspecto del desarrollo, desde el diseño de conceptos hasta la
                    programación y la implementación final. Estamos entusiasmados de compartir nuestro trabajo con el mundo
                    y
                    estamos ansiosos por ofrecer una experiencia de juego que cautivará e inspirará a nuestros jugadores.
                    ¡Únete
                    a nosotros y creemos momentos inolvidables para todos!
                </p>
            </div>
        </div>
    </section>

    <div class="wrapper">

        <section class="module-team">

            <div class="team">
                <h2 class="title">Meet our Team</h2>
                <div class="team-cards">

                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div id="wrapper2" class="swiper-wrapper"></div>
                    </div>

                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="navigation">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

<!-- Incluimos el footer -->
@section('footer')
    @include('footer.footer')
@endsection
