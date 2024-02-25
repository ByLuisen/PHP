@extends('layouts.app')

@section('title', 'Listar propietarios')

@section('content')
    <h2>Propietarios</h2>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="table-active">
                <th scope="col">Nif</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{ $propietario->nif }}</td>
                    <td>{{ $propietario->nom }}</td>
                    <td>{{ $propietario->email }}</td>
                    <td>{{ $propietario->movil }}</td>
                    <td>
                        <a href="{{ route('propietario.edit', $propietario->nif) }}"
                            class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <a href="{{ route('propietario.destroy', $propietario->nif) }}"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
