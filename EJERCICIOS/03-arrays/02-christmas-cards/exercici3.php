<?php

declare(strict_types=1);
require_once "functions-structure.php";
require_once "functions-arrays.php";
require_once "datos.php";
require_once "session-handler.php";
//Incrementar las visitas de la página Ejercicio 3
incrementarVisitasEj3();
// Mostrar head
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <!------------------------ WEB Code ------------------------>
    <main>
        <?php
        // Mostrar navbar
        myMenu();
        //Declarar variables
        $autores = "Pedro López; Ana Pérez; Juan Bartolomé; Luis García";
        ?>
        <div class="container">
            <div class="row">
                <div class="text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                    <?php echo getVisitasEj3() ?>
                </div>
                <div class="text-center my-3">
                    <div class="mb-4">
                        <h2>
                            <<<<< Convertir array ciudades en string>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Convertir array $ciudades en string
                        echo implode(", ", $ciudades); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Convertir string autores en array>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Convertir string $autores en array
                        $autoresArray = explode('; ', $autores);
                        print_r($autoresArray) ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Asignar autor a cada icono>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Asignar un autor a cada icono
                        asignarAutoresAIconos($iconos, $autoresArray) ?>
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