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
                <th>Visit's ID</th>
                <th>Visit's ID Pet</th>
                <th>Visit's Date</th>
                <th>Visit's motive</th>
                <th>Visit's description</th>
            </tr>
        </thead>

        <!-- table content -->
        <tbody>
            <?php
            foreach ($historiales as $historial) {
                echo "<form method='post' action='{{ route('list_history') }}'>";
                echo "<input style='display: none;' type='text' name='id' value={$historial['id']}>";
                // Each propietario of the array $content is an owner
                echo "<tr>";
                echo "<td>{$historial['id']}</td>";
                echo "<td>{$historial['idmascota']}</td>";
                echo "<td>{$historial['fecha']}</td>";
                echo "<td>{$historial['motivo_visita']}</td>";
                echo "<td>{$historial['descripcion']}</td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
        </tbody>

    </table>
</div>
@endsection
