@extends('layouts.app')

@section('title', 'Listar propietarios')

@section('content')
    <!-- only a div -->
    <div id="content">
        <h2 class="fw-bold">Propietarios</h2>
        <table class="table table-striped table-bordered border-dark">

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
                <?php
                foreach ($content as $element) {
                    echo "<form method='post' actio=''>";
                    echo "<input style='display: none;' type='text' name='nif' value={$element['nif']}>";
                    // Each element of the array $content is an owner
                    echo '<tr>';
                    echo "<td>{$element['nif']}</td>";
                    echo "<td>{$element['nom']}</td>";
                    echo "<td>{$element['email']}</td>";
                    echo "<td>{$element['movil']}</td>";
                    echo "<td><button class='btn btn-primary' type='submit' name='action' value='find_owner_to_update'>Update</button></td>";
                    echo "<td><button class='btn btn-danger' type='submit' name='action' value='delete'>Delete</button></td>";
                    echo '</tr>';

                    echo '</form>';
                }
                ?>
            </tbody>

        </table>
    </div>
@endsection
