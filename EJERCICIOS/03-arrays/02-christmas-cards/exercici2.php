<?php

declare(strict_types=1);
require_once "functions-structure.php";
require_once "functions-arrays.php";
require_once "datos.php";
require_once "session-handler.php";
//Incrementar las visitas de la página Ejercicio 2
incrementarVisitasEj2();
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
        $par = [];
        $impar = [];
        ?>
        <div class="container">
            <div class="row">
                <div class="text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                    <?php echo getVisitasEj2() ?>
                </div>
                <div class="text-center my-3">
                    <div class="mb-4">
                        <h2>
                            <<<<< Array Multidimensional>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Mostrar array multidimensional de todos los iconos
                        mostrarArrayMultidimensional($iconos); ?>
                    </div>
                    <div class="mb-4">
                        <?php
                        //Guardar los iconos con índice par o impares en los arrays pasados por parametro
                        generarArrayIndexParImpar($par, $impar, $iconos); ?>
                        <h2>
                            <<<<< Array Iconos Pares>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Mostrar array multidimensional de iconos pares
                        mostrarArrayMultidimensional($par); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Array Iconos Impares>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Mostrar array multidimensional de iconos impares
                        mostrarArrayMultidimensional($impar); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Array mergeado>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        $merge = array_merge($par, $impar);
                        //Mostrar array multidimensional del array $merge
                        mostrarArrayMultidimensional($merge); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Iconos con más likes>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Mostrar los iconos con mas likes
                        iconosConMaxOMinLikes($iconos);
                        ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Iconos con menos likes>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Mostrar los iconos con menos likes
                        iconosConMaxOMinLikes($iconos, true);
                        ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Array descendente por número de likes>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Ordenar los likes en orden descendente
                        usort($merge, 'ordenarLikesDescendente');
                        //Mostrar array multidimensional de los likes ordenados
                        mostrarArrayMultidimensional($merge); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Array ordenado por tagName>>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Ordena el array pro TagName
                        usort($merge, 'ordenarPorTagName');
                        //Mostrar array multidimensional con los TagName ordenados
                        mostrarArrayMultidimensional($merge); ?>
                    </div>
                    <div class="mb-4">
                        <h2>
                            <<<<< Existe el icono con tagName "Neo">>>>>
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center mb-5">
                        <?php
                        //Saber si el TagName existe
                        existeTagName($merge, "#Neo")
                        ?>
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