@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\eventos.css') }}">
@endsection
@section('content')
    <div class="login-box text-center">
        <form>
            <a href="{{ route('crear_eventos') }}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                CREAR EVENTO
            </a>
        </form>
    </div>
@endsection
