@extends('layouts.mascotas')
@section('title', 'LIST')
@section('content')
<!-- only a div -->
<div id="content">
    <h2>Owners</h2>
    <table class="table">
        <!-- table headers -->
        <thead class="thead-light">
            <tr>
                <th>Nif</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <!-- table content -->
        <tbody>
            @foreach ($propietarios as $propietario)
                <tr>
                    <td>{{ $propietario->nif }}</td>
                    <td>{{ $propietario->nom }}</td>
                    <td>{{ $propietario->email }}</td>
                    <td>{{ $propietario->movil }}</td>
                    <td>
                        <form method="POST" action="{{ route('modify', ['nif' => $propietario->nif]) }}">
                            @csrf
                            <button class="btn btn-primary" type="submit" name="action" value="find_owner_to_update">Update</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('delete', ['nif' => $propietario->nif]) }}">
                            @csrf
                            @method('POST') <!-- Agregar este campo para indicar el método POST -->
                            <button class="btn btn-danger" type="submit" name="action" value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

