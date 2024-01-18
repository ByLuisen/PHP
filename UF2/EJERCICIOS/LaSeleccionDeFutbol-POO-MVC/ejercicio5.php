<?php

declare(strict_types=1);
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');
//Mostrar HEAD
myHead('Ejercicio 5');
myMenu();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <div class="container">
        <?php
        $nombre_archivo = 'data/entrenadores.csv';
        listarCsv($nombre_archivo);
        ?>
    </div>
    <?php myFooter(); ?>
</body>