<?php

declare(strict_types=1);
//Define un nombre de sesión único para home
session_name("home");
require_once "functions-structure.php";
require_once "functions.php";
// Mostrar head
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <!------------------------ WEB Code ------------------------>
    <main>
        <?php
        // Mostrar navbar
        myMenu(); ?>
        <div class="container m-auto my-5">
            <div class="row">
                <div>
                    <h1 class="text-center">Welcome juego de dados</h1>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="my-5">
                    <!-- Mostrar las imagenes de cada dado usando la función para obtener la ruta -->
                    <?php echo "<img src=" . obtenerImagenDado(1) . " width=150px alt='Dado 1'>"; ?>
                    <?php echo "<img src=" . obtenerImagenDado(2) . " width=150px alt='Dado 2'>"; ?>
                    <?php echo "<img src=" . obtenerImagenDado(3) . " width=150px alt='Dado 3'>"; ?>
                    <?php echo "<img src=" . obtenerImagenDado(4) . " width=150px alt='Dado 4'>"; ?>
                    <?php echo "<img src=" . obtenerImagenDado(5) . " width=150px alt='Dado 5'>"; ?>
                    <?php echo "<img src=" . obtenerImagenDado(6) . " width=150px alt='Dado 6'>"; ?>
                </div>
                <div class="w-75">
                    <!-- Explicar en que consiste el juego -->
                    <p>Tiene un <b>menú con 3 opciones: Juego1 | Juego2 | Juego3.</b></p>
                    <p><b>- Juego1.</b> Juega un jugador solo. Inicia el juego con 0 puntos y 0 tiradas.
                        Al recargar la página se tira el dado, realizar 3 tiradas sumar los puntos totales, entonces el juego finalizará.</p>
                    <p><b>- Juego2.</b> Juegan 2 jugadores con 1 dado cada uno. Se inicia el juego tirando los 2 dados, quien saca más puntos
                        gana 1 punto, si hay empates: gana 1 punto cada jugador. Realizar 5 tiradas y se acaba el juego mostrando quien es el ganador.</p>
                    <p><b>- Juego3.</b> Juegan 3 jugadores con 2 dados cada uno. Se inicia el juego tirando los 3 dados, quien saca más puntos gana 1 punto,
                        si hay empates: gana 1 punto cada jugador. Realizar 5 tiradas y se acaba el juego mostrando quien es el ganador.</p>
                </div>
            </div>
        </div>
    </main>

    <?php
    //Mostrar Footer
    myFooter() ?>
</body>

</html>