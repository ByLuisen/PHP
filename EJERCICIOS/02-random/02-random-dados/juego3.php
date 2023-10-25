<?php

declare(strict_types=1);
//Define un nombre de sesión único para el juego 3
session_name('juego3');
require_once './functions.php';
require_once './functions-structure.php';
//Mostrar el head
myHead() ?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar el navbar
    myMenu();
    //Definir variables
    //Número máximo de rondas en este juego
    const MAX_TIRADAS = 5;
    //Obtener el número de dados aleatorios en el juego almacenados en un array
    $dados = obtenerDadosAleatorios(6);
    $puntos = [$dados[0] + $dados[1], $dados[2] + $dados[3], $dados[4] + $dados[5]];
    ?>

    <!------------------------ WEB Code ------------------------>
    <main>
        <div class="container text-center justify-content-center">
            <div class="row">
                <div class="justify-content-center">
                    <div class="text-center mb-5">
                        <!-- Mostrar en que tirada se encuentra el juego  -->
                        <h2>Tirada <?php echo $numTiradas = contadorDeTiradas(MAX_TIRADAS) ?></h2>
                        <!-- Sumar un punto al ganador dependiendo de que jugador a sacado el número mas alto,
                        si es empate se suma un punto a todos los jugadores  -->
                        <?php $mensaje = sumarPuntuacion($puntos) ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="mx-4">
                            <div>
                                <div>
                                    <h2>Jugador 1<h2>
                                </div>
                                <div>
                                    <!-- Mostrar la puntuación total del jugador 1-->
                                    <h2>Puntos <?php echo $_SESSION["puntosJugador1"]  ?></h2>
                                </div>
                                <div class="my-3">
                                    <div class="mb-2">
                                        <!-- Mostrar el dado de la primera tirada del jugador 1 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[0]) . " width=200px alt='Dado 1 Jugador 1'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el dado de la segunda tirada del jugador 1 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[1]) . " width=200px alt='Dado 2 Jugador 1'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el resultado de las dos tiradas del jugador 1 -->
                                        <h2><?php echo $puntos[0] ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-4">
                            <div>
                                <div>
                                    <h2>Jugador 2<h2>
                                </div>
                                <div>
                                    <!-- Mostrar la puntuación total del jugador 2-->
                                    <h2>Puntos <?php echo $_SESSION["puntosJugador2"] ?></h2>
                                </div>
                                <div class="my-3">
                                    <div class="mb-2">
                                        <!-- Mostrar el dado de la primera tirada del jugador 2 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[2]) . " width=200px alt='Dado 1 Jugador 2'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el dado de la segunda tirada del jugador 2 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[3]) . " width=200px alt='Dado 2 Jugador 2'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el resultado de las dos tiradas del jugador 2 -->
                                        <h2><?php echo $puntos[1] ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-4">
                            <div>
                                <div>
                                    <h2>Jugador 3<h2>
                                </div>
                                <div>
                                    <!-- Mostrar la puntuación total del jugador 3-->
                                    <h2>Puntos <?php echo $_SESSION["puntosJugador3"] ?></h2>
                                </div>
                                <div class="my-3">
                                    <div class="mb-2">
                                        <!-- Mostrar el dado de la primera tirada del jugador 3 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[4]) . " width=200px alt='Dado 1 Jugador 3'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el dado de la segunda tirada del jugador 3 -->
                                        <?php echo "<img src=" . obtenerImagenDado($dados[5]) . " width=200px alt='Dado 2 Jugador 3'>"; ?>
                                    </div>
                                    <div>
                                        <!-- Mostrar el resultado de las dos tiradas del jugador 3 -->
                                        <h2><?php echo $puntos[2] ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h2>
                            <!--- Mostrar un mensaje si el número de tiradas es igual a 5 diciendo el ganador del juego,
                            si no imprime un mesage del ganador de cada ronda --->
                            <?php echo ($numTiradas == MAX_TIRADAS) ? decidirGanadorJuego() : $mensaje; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    //Mostrar el footer
    myFooter(); ?>
</body>

</html>