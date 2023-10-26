<?php

function myHead()
{
    echo <<< HEAD
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- links to Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <!-- files CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <title>Vape Bengala</title>
    </head>

    HEAD;
}

function myMenu()
{
    echo <<< MENU
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: #faba42">
            <div class="container">
                <a class="navbar-brand me-5" href="./index.php" style="flex:1;"><img src="./img/Yoshifumon.png" alt="Yoshi Fum" width="70px"> <img src="./img/nombre.png" width="220px"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 22px;">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>

            </div>
            </nav>
        </header>
    MENU;
}

// Función herecode que determina la estructura del footer
function myFooter(): void
{
    // Obtener la fecha y hora
    date_default_timezone_set('Europe/Madrid');
    $fechaHora = "La fecha es: " . date("d-m-Y") . " y la hora es " . date("h:i:s");

    echo <<<FOOTER
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="mb-3 mb-md-0">&copy; Bengala Spain 2023</span>
                    </div>
                    <div class="text-end">
                        $fechaHora
                    </div>
                </div>
            </div>
        </div>
    </footer>
    FOOTER;
}
