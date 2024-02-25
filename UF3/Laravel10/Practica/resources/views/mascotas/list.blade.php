@extends('layouts.mascotas')
@section('title','LIST')
@section('content')
<!-- only a div -->
<div id="content">
    <h2>Pets</h2>
    <table class="table">

        <!-- table headers -->
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Nif Propietario</th>
                <th>Nombre</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <!-- table content -->
        <tbody>
            <?php
            foreach ($mascotas as $mascota) {
                echo "<form method='post' action='{{ route('list_pet') }}'>";
                echo "<input style='display: none;' type='text' name='id' value={$mascota['id']}>";
                // Each propietario of the array $content is an owner
                echo "<tr>";
                echo "<td>{$mascota['id']}</td>";
                echo "<td>{$mascota['nifpropietario']}</td>";
                echo "<td>{$mascota['nom']}</td>";
                echo "<td><button class='btn btn-primary' type='submit' name='action' value='find_owner_to_update'>Update</button></td>";
                echo "<td><button class='btn btn-danger' type='submit' name='action' value='delete'>Delete</button></td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
        </tbody>

    </table>
</div>
@endsection
