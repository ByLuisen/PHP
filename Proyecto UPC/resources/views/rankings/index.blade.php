@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\ranking.css') }}">
@endsection
@section('content')
    <div class="container" style="padding: 110px 0px 44px">
        <div class="row justify-content-between">
            <div class="col-8 ranking">
                <h1 class="p-0">
                    RANKING
                </h1>
                <table class="table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Posición</th>
                            <th scope="col">Jugador</th>
                            <th scope="col">Partidas Jugadas</th>
                            <th scope="col">Ganadas</th>
                            <th scope="col">Empatadas</th>
                            <th scope="col">Perdidas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr>
                                <th scope="row">{{ $dato['posicion'] }}</th>
                                <td>{{ $dato['jugador'] }}</td>
                                <td>{{ $dato['partidas_jugadas'] }}</td>
                                <td>{{ $dato['partidas_ganadas'] }}</td>
                                <td>{{ $dato['partidas_empatadas'] }}</td>
                                <td>{{ $dato['partidas_perdidas'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4 filtros">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col p-0">
                            <h2 class="p-0">
                                FILTROS
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="jugador" class="text-white">Buscar por Jugador</label>
                                    <input id="jugador" type=text placeholder="Jugador"
                                        class="form-control
                                        @error('jugador') is-invalid @enderror"
                                        name="jugador">

                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn p-1 text-light" style="background-color: #FF00FB">
                                            Buscar
                                        </button>
                                    </div>

                                    @error('jugador')
                                        <span class="text-center invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
