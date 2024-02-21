@extends('layouts.app')

@section('CDNs')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@4.5.0/dist/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.plyr.io/3.4.6/plyr.css">
@endsection

@section('estilos')
    <!-- Enlaces a tus estilos generales -->
    <link rel="stylesheet" href="{{ asset('css\cartas.css') }}">
    <link rel="stylesheet" href="{{ asset('css\team.css') }}">
@endsection

@section('content')
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-bs-ride="carousel"
        style="height: 1035px">
        <!-- Inner -->
        <div class="carousel-inner h-100">
            <!-- Single item -->
            <div class="carousel-item active h-100">
                <video style="max-width: 100%;" playsinline autoplay muted loop>
                    <source
                        src="{{ asset('videos/20200404_Legends of Runeterra： Anuncio de lanzamiento y tráiler ｜ Legends of Runeterra.webm') }}"
                        type="video/mp4" />
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
    <div class="section" style="background-image: url({{ asset('images/fondo.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col">
                    <video controls crossorigin playsinline
                        poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
                        <!-- Video files -->
                        <source
                            src="{{ asset('videos/20200412_Exhibición de región： Islas de la Sombra - Jugabilidad ｜ Legends of Runeterra.mp4') }}"
                            type="video/mp4" sizes="576" />
                        <source
                            src="{{ asset('videos/20200412_Exhibición de región： Islas de la Sombra - Jugabilidad ｜ Legends of Runeterra.webm') }}"
                            type="video/webm" sizes="720" />

                        <!-- Caption files -->
                        <track kind="captions" label="English" srclang="en"
                            src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
                        <track kind="captions" label="Français" srclang="fr"
                            src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

                        <!-- Fallback for browsers that don't support the <video> element -->
                        <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                            download>Download</a>
                    </video>
                </div>
                <div class="col">
                    <h2>Descifra el tablero y conviértete en un estratega sobresaliente</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit curabitur ridiculus, id aliquam duis posuere
                        ultricies erat conubia orci, pulvinar sagittis pellentesque natoque eget sem scelerisque varius.
                        Vestibulum enim auctor nullam etiam mattis et ullamcorper posuere.</p>
                </div>
            </div>
            <div class="row text-center text-white" style="padding: 10% 5%;">
                <div class="col">
                    <img src="{{ asset('images/avatar1sf.png') }}" alt="">
                    <h2>Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet. Est sapiente minima ab dolorem veritatis qui mollitia atque aut
                        voluptatem
                        quia et iure amet. At officiis provident eum alias illum nam error odit non quia corrupti ut
                        eligendi
                        facere?</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/avatar1sf.png') }}" alt="">

                    <h2>Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet. Est sapiente minima ab dolorem veritatis qui mollitia atque aut
                        voluptatem
                        quia et iure amet. At officiis provident eum alias illum nam error odit non quia corrupti ut
                        eligendi
                        facere?</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/avatar1sf.png') }}" alt="">

                    <h2>Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet. Est sapiente minima ab dolorem veritatis qui mollitia atque aut
                        voluptatem
                        quia et iure amet. At officiis provident eum alias illum nam error odit non quia corrupti ut
                        eligendi
                        facere?</p>
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
                            style="background: linear-gradient(to top, #27270f99, #203a4300, #2c536400), url('../images/{{ $valor }}.png') no-repeat 50% 50% / contain #d4ab30;">
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
        style="background: linear-gradient(180deg, #e32f95 50%, #784ba0f4 100%, #2b85c5 100%); padding-top: 50px; padding-bottom: 50px;">
        <div>
            <!-- Paragrafo info de equipo -->
            <div class="container">
                <p class="p-3"
                    style="font-weight: 700;
                font-size: 1.1rem; text-align: center; color: white;">
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
                <h2 class="title">Conoce nuestro equipo</h2>

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

        </section>
    </div>
@endsection

<!-- Incluimos el footer -->
@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js\cartas.js') }}"></script>
    <script type="module" src="{{ asset('js\team.js') }}"></script>
@endsection
