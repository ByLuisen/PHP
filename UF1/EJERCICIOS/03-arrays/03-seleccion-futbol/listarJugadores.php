<?php

declare(strict_types=1);
session_name('seleccionFutbol');
session_start();

require_once('src/functions-structure.php');
require_once('src/functions-login.php');
require_once('src/functions.php');
require_once('data/data.php');
//Mostrar HEAD
myHead('Listar Jugadores');
myMenuTrainer();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <div class="container">
        <div class="row pt-5">
            <div class="col-xxl-5 p-4" style="background:linear-gradient(180deg, #ebeceb -0.35%, #ebeceb -0.34%, #74ff00 99.65%); border-radius: 23px; border-color: black;border-style: solid;">
                <?php
                $nombre_archivo = 'data/jugadores.csv';
                listarCsv($nombre_archivo);
                ?>
            </div>
        </div>
    </div>
    <?php myFooter(); ?>
</body>