@extends('layouts.app')

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
@endsection
