<?php

myHead('Listado de contactos');
?>

<body>
    <h1>Listado de contactos</h1>
    <style>
        th {
            width: 8rem;
            text-align: left;
            border-bottom: 1px solid black;
        }

        td {
            width: 8rem;
        }
    </style>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha Nacimiento</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($rowset as $row) : ?>
            <tr>
                <td><?php echo $row->getNombre() ?></td>
                <td><?php echo $row->getApellidos() ?></td>
                <td><?php echo $row->getFechaNacimiento() ?></td>
                <td><?php echo $row->getEmail() ?></td>
                <td>
                    <a href="index.php?action=ver&id=<?php echo $row->getNombre() ?>">Ver</a>
                    <a href="index.php?action=editar&id=<?php echo $row->getNombre() ?>">Editar</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>