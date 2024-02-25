@extends('layouts.app')

@section('title', 'Listar líneas de historial')

@section('content')
    <h2>History List</h2>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="table-active">
                <th scope="col">Visit's ID</th>
                <th scope="col">Visit's ID Pet</th>
                <th scope="col">Visit's Date</th>
                <th scope="col">Visit's motive</th>
                <th scope="col">Visit's description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lineas_de_historial as $historial)
                <tr>
                    <td>{{ $historial->id }}</td>
                    <td>{{ $historial->mascota_id }}</td>
                    <td>{{ $historial->fecha }}</td>
                    <td>{{ $historial->motivo_visita }}</td>
                    <td>{{ $historial->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
