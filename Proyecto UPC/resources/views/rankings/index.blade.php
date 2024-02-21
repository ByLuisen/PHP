@extends('layouts.app')
@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\ranking.css') }}">
@endsection
@section('content')
<div class="ranking text-center">
<h1>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
               RANKINGS
</h1>
<table class="table table-sm table-hover table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">Posición</th>
      <th scope="col">Nombre</th>
      <th scope="col">Partidas Ganadas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    <tr>
      <th scope="row">{{ $dato['posicion'] }}</th>
      <td>{{ $dato['nombre'] }}</td>
      <td>{{ $dato['partidas_ganadas'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
