<?php

declare(strict_types=1);
//Define un nombre de sesión único para el juego 1
session_name("juego1");
require_once './functions.php';
require_once './functions-structure.php';
//Mostrar el head
myHead() ?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar el navbar
    myMenu();
    //Definir variables
    //Definir el número máximo de tiradas que tendra este juego
    const MAX_TIRADAS = 3;
    //Obtener tirada del jugador entre el 1 al 6
    $numJugador = obtenerNumeroAleatorio();
    ?>

    <!------------------------ WEB Code ------------------------>
    <main>
        <div class="container text-center mt-5">
            <div class="row mb-5">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center">
                        <div class="mx-4">
                            <h2>Tirada</h2>
                            <!-- Mostrar en que tirada se encuentra el juego -->
                            <h2><?php echo $numTiradas = contadorDeTiradas(MAX_TIRADAS) ?><h2>
                        </div>
                        <div class="mx-4">
                            <!-- Mostrar el dado del jugador dependiendo de la tirada que ha salido -->
                            <?php echo "<img src=" . obtenerImagenDado($numJugador) . " width=400px alt='Dado Jugador 1'>"; ?>
                        </div>
                        <div class="mx-4">
                            <h2>Puntos</h2>
                            <!-- Mostrar por pantalla la puntuación total del jugador-->
                            <h2><?php echo ($numTiradas != 0) ? $_SESSION['puntosJugador1'] += $numJugador : $_SESSION['puntosJugador1'] ?><h2>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <h2>
                        <!--- Mostrar un mensaje si el número de tiradas es igual a 3 diciendo el resultado del juego, si no, no muestra nada --->
                        <?php echo ($numTiradas == MAX_TIRADAS) ? "FIN DEL JUEGO. PUNTOS TOTALES: " . $_SESSION['puntosJugador1'] : ''; ?>
                    </h2>
                </div>
            </div>
        </div>
    </main>

    <?php
    //Mostrar el footer
    myFooter(); ?>
</body>

</html>