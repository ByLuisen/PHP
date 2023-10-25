<?php

declare(strict_types=1);
require_once('functions-structure.php');
require_once('functions.php');
require_once('data.php');
//Mostrar HEAD
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar MENU
    myMenu();
    //Generar plantilla de la carta
    $carta = generarPlantillaCarta();
    //Obtener los nombres de los jugadores
    $nombres = array_keys($jugadores);
    ?>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>EJERCICIO 1</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="text-center">
                <?php
                //Crear las cartas y los archivos
                $archivosGeneradosOk = generarFicheros(generarCartas($carta, $nombres));
                /* Mostrar mensaje de error si la anterior función devolvió false, 
                si no mostrar mensaje de que todo ha salido bien */
                echo (!$archivosGeneradosOk) ? "Fallo al generar los arhivos" : "Archivos generados correctamente"
                ?>
            </div>
        </div>
    </div>
    <?php
    //Mostrar FOOTER
    myFooter();
    ?>
</body>