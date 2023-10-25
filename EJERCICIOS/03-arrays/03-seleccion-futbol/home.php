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
    ?>
    <div class="container">
        <div class="row my-3">
            <div class="text-center">
                <h1>BIENVENIDO A LA SELECCIÓN DE MONTEPINAR</h1>
            </div>
        </div>
        <div class="row my-5">
            <div class="d-flex flex-wrap justify-content-center mb-5">
                <?php
                //Mostrar selección y todos los datos de cada jugador a partir de un array
                mostrarSeleccion($jugadores); ?>
            </div>
        </div>
    </div>
    <?php
    //Mostrar FOOTER
    myFooter();
    ?>
</body>