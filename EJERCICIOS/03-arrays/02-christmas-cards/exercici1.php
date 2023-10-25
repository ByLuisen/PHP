<?php

declare(strict_types=1);
require_once "functions-structure.php";
require_once "functions-arrays.php";
require_once "session-handler.php";
//Incrementar las visitas de la página Ejercicio 1
incrementarVisitasEj1();
// Mostrar head
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <!------------------------ WEB Code ------------------------>
    <main>
        <?php
        // Mostrar navbar
        myMenu();
        // Declarar variables
        $cards = [];
        ?>
        <div class="container">
            <div class="row">
                <div class="text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                    <?php echo getVisitasEj1() ?>
                </div>
                <div class="text-center my-3">
                    <div>
                        <div class="mb-5">
                            <h2>
                                <<<<< Cargar Array>>>>>
                            </h2>
                        </div>
                        <div class="mb-5">
                            <?php
                            // Generar valores random a un array con una determinada longitud (ambos pasados por parámetro) 
                            generarRandomArrayInteger(mt_rand(1, 20), $cards);
                            // Mostrar imagenes en función de los valores del array aleatorios
                            mostrarArrayIndexado($cards); ?>
                        </div>
                    </div>

                    <div>
                        <div class="mb-5">
                            <h2>
                                <<<<< Eliminando el 1º>>>>>
                            </h2>
                        </div>
                        <div class="mb-5">
                            <?php array_shift($cards);
                            // Mostrar imagenes en función de los valores del array aleatorios
                            mostrarArrayIndexado($cards); ?>
                        </div>
                    </div>

                    <div>
                        <div class="mb-5">
                            <h2>
                                <<<<< Añadiendo una imagen extra al final>>>>>
                            </h2>
                        </div>
                        <div class="mb-5">
                            <?php array_push($cards, mt_rand(0, 19));
                            // Mostrar imagenes en función de los valores del array aleatorios
                            mostrarArrayIndexado($cards) ?>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?php
    //Mostrar Footer
    myFooter() ?>
</body>

</html>