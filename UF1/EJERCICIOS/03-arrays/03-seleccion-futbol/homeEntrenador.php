<?php

declare(strict_types=1);
session_name('seleccionFutbol');
session_start();

require_once('src/functions-structure.php');
require_once('src/functions-login.php');
require_once('src/functions.php');
require_once('data/data.php');
require_login();
// Mostrar head
myHead('Home entrenadores');


// Verificar y actualizar el contador de visitas
if (isset($_SESSION['username'])) {
    $visits = isset($_COOKIE[$_SESSION['username']]) ? $_COOKIE[$_SESSION['username']] : 0;
    $visits++;
    // Establecer la cookie con el contador de visitas
    setcookie($_SESSION['username'], strval($visits), time() + (86400 * 30), "/"); // Cookie válida por 30 días
}
?>


<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    myMenuTrainer()
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
    myFooter();
    ?>
</body>