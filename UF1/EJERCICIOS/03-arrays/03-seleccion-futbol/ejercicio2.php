<?php


declare(strict_types=1);
require_once('src/functions-structure.php');
require_once('src/functions.php');
require_once('data/data.php');
//Mostrar HEAD
myHead('Ejercicio 2');
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar MENU
    myMenu();
    //Generar plantilla de la carta con etiquetas <pre>
    $carta = generarPlantillaCarta(true);
    //Obtener los nombres de los jugadores
    $nombres = array_keys($jugadores);
    ?>
    <div class="container">
        <div class="row mb-4">
            <div class="text-center">
                <h1>EJERCICIO 2</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div>
                <?php
                /* Generamos las cartas y las mostramos mediante la obtención del contenido de
                cada carta */
                echo obtenerContenidoCartas(generarCartas($carta, $nombres));
                ?>
            </div>
        </div>
    </div>
    <?php
    //Mostrar FOOTER
    myFooter();
    ?>
</body>