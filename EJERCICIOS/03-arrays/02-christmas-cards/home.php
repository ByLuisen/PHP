<?php

declare(strict_types=1);
require_once "functions-structure.php";
require_once "functions-arrays.php";
require_once "session-handler.php";
//Incrementar las visitas de la página Home
incrementarVisitasHome();
//Mostrar head
myHead();
?>

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    //Mostrar navbar
    myMenu();
    ?>

    <!------------------------ WEB Code ------------------------>
    <main>
        <div class="container">
            <div class="row my5">
                <div class="text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                    <?php echo getVisitasHome() ?>
                </div>
                <div class="text-center my-3">
                    <?php
                    echo "<p class = m-0>Mi color favorito es el {$_SESSION["favcolor"]}</p>";
                    echo "<p class = m-0>Mi animal favorito es el {$_SESSION["favanimal"]}</p>";
                    ?>
                    <h1 style="font-size: 80px;">Welcome</h1>
                    <h1 style="font-size: 80px;">Christmas Cards</h1>
                </div>
            </div>
            <div class="row my-5">
                <div class="text-center">
                    <?php
                    //Mostrar todas las imagenes de la carpeta img
                    mostrarImagenes(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    //Mostrar footer
    myFooter() ?>
</body>

</html>