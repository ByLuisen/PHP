@extends('layouts.app')

@section('title', 'Listar mascotas')

@section('content')
    <h2>Pets</h2>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Owner's NIF</th>
                <th scope="col">Pet Name</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
                <tr>
                    <td>{{ $mascota->id }}</td>
                    <td>{{ $mascota->nif_propietario }}</td>
                    <td>{{ $mascota->nom }}</td>
                    <td>
                        <a href="{{ route('mascota.edit', $mascota->id) }}" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('mascota.destroy', $mascota->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
