@extends('layouts.mascotas')

@section('title', 'SEARCH_PUPPET')

@section('content')
    @if (!isset($propietarios))
        <h2>Search Pet by Owner's NIF</h2>

        <form method="post" action="{{ route('search') }}">
            @csrf

            <div class="form-group form-inline">
                NIF *:
                <input type="text" placeholder="NIF" name="nif"
                    value="{{ isset($propietario) ? $propietario->nif : '' }}">
            </div>
            <p>* Required fields</p>

            <input class="btn-success mr-2" type="submit" name="action" value="search">
            <input class="btn-danger" type="submit" name="reset" value="reset">
        </form>
    @endif
    @if (isset($propietarios))
        <div id="content">
            <table class="table">
                <!-- table headers -->
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nif Propietario</th>
                        <th>Nombre Mascota</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <!-- table content -->
                <tbody>
                    <tr>
                        <td>{{ $mascotas->id }}</td>
                        <td>{{ $propietarios->nif }}</td>
                        <td>{{ $mascotas->nom }}</td>
                        <td><button class="btn btn-primary" type="submit" name="action"
                                value="find_owner_to_update">Update</button></td>
                        <td><button class="btn btn-danger" type="submit" name="action" value="delete">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
@endsection
