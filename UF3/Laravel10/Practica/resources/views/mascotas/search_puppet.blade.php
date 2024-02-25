@extends('layouts.mascotas')

@section('title', 'SEARCH_PUPPET')

@section('content')
    @if (!isset($mascotas))
        <!-- Formulario de búsqueda de mascotas -->
        <h2>Search Pet by ID</h2>
        <form method="post" action="{{ route('search_pet') }}">
            @csrf
            <div class="form-group form-inline">
                Id *:
                <input type="text" placeholder="ID" name="id" value="{{ isset($mascotas) ? $mascotas->id : '' }}">
            </div>
            @error('id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <p>* Required fields</p>
            <input class="btn btn-success mr-2" type="submit" name="action" value="search">
            <input class="btn btn-danger" type="submit" name="reset" value="reset">
        </form>
    @endif

    @if (isset($mascotas))
        <!-- Información de la mascota -->
        <div class="pet-info">
            <h2>Pet Information</h2>
            <table class="table">
                <!-- Table headers -->
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>NIF Propietario</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <!-- Table content -->
                <tbody>
                    <tr>
                        <td>{{ $mascotas->id }}</td>
                        <td>{{ $mascotas->nifpropietario }}</td>
                        <td>{{ $mascotas->nom }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Información del propietario -->
        <div class="owner-info">
            <h2>Owner Information</h2>
            <table class="table">
                <!-- Table headers -->
                <thead class="thead-light">
                    <tr>
                        <th>NIF</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <!-- Table content -->
                <tbody>
                    <tr>
                        <td>{{ $propietarios->nif }}</td>
                        <td>{{ $propietarios->nom }}</td>
                        <td>{{ $propietarios->email }}</td>
                        <td>{{ $propietarios->movil }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Historial de la mascota -->
        <div class="pet-history">
            <h2>Pet History</h2>
            <table class="table">
                <!-- Table headers -->
                <thead class="thead-light">
                    <tr>
                        <th>Visit ID</th>
                        <th>Visit Date</th>
                        <th>Visit Motive</th>
                        <th>Visit Description</th>
                    </tr>
                </thead>
                <!-- Table content -->
                <tbody>
                    <?php
                    foreach ($historiales as $historial) {
                        echo "<tr>";
                        echo "<td>{$historial['id']}</td>";
                        echo "<td>{$historial['idmascota']}</td>";
                        echo "<td>{$historial['fecha']}</td>";
                        echo "<td>{$historial['motivo_visita']}</td>";
                        echo "<td>{$historial['descripcion']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    @endif
@endsection

