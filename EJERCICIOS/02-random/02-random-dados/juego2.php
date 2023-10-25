<?php

declare(strict_types=1);
//Define un nombre de sesión único para el juego 2
session_name("juego2");
require_once './functions.php';
require_once './functions-structure.php';
//Imprimir el head
myHead() ?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar el navbar
    myMenu();
    //Definir variables
    //Definir el número máximo de tiradas que tendra este juego
    const MAX_TIRADAS = 5;
    //Obtener el número de dados aleatorios en el juego almacenados en un array
    $dados = obtenerDadosAleatorios(2);
    ?>

    <!------------------------ WEB Code ------------------------>
    <main>
        <div class="container text-center mt-5 justify-content-center">
            <div class="row mb-5">
                <div class="justify-content-center">
                    <div class="text-center">
                        <h2>Tirada</h2>
                        <!-- Mostrar en que tirada se encuentra el juego  -->
                        <h2><?php echo $numTiradas = contadorDeTiradas(MAX_TIRADAS) ?><h2>
                    </div>
                    <!-- Sumar un punto al ganador dependiendo de que jugador a sacado el número mas alto,
                    si es empate se suma un punto a ambos  -->
                    <?php $mensaje = sumarPuntuacion($dados) ?>

                    <div class="d-flex align-items-center justify-content-center">
                        <div class="mx-4">
                            <h2>Jugador 1<h2>
                                    <h2>Puntos</h2>
                                    <!-- Mostrar los puntos del jugador 1-->
                                    <h2><?php echo $_SESSION["puntosJugador1"]  ?><h2>
                        </div>
                        <div class="mx-4">
                            <!-- Mostrar el dado del jugador 1 -->
                            <?php echo "<img src=" . obtenerImagenDado($dados[0]) . " width=400px alt='Dado Jugador 1'>"; ?>
                        </div>
                        <div class="mx-4">
                            <!-- Mostrar el dado del jugador 2 -->
                            <?php echo "<img src=" . obtenerImagenDado($dados[1]) . " width=400px alt='Dado Jugador 2'>"; ?>
                        </div>
                        <div class="mx-4">
                            <h2>Jugador 2<h2>
                                    <h2>Puntos</h2>
                                    <!-- Mostrar los puntos del jugador 2-->
                                    <?php echo "<h2>" . $_SESSION["puntosJugador2"] . "</h2>" ?>
                        </div>
                    </div>

                    <div class="my-4">
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