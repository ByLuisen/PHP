<?php

// Función herecode que determina la estructura del head
function myHead($title): void
{
    echo <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <title>$title</title>
    </head>
    CABECERA;
}

// Función herecode que determina la estructura del menú
function myMenu(): void
{
    echo <<<MENU
    <header>
        <nav class="navbar navbar-expand-lg border-bottom border-2 border-black mb-5">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ejercicio1.php">Ejercicio 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ejercicio2.php">Ejercicio 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ejercicio3.php">Ejercicio 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ejercicio4.php">Ejercicio 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ejercicio5.php">Ejercicio 5</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Login</a>
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
    <footer class="bg-secondary-subtle py-3 mt-auto">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="mb-3 mb-md-0 text-muted">&copy; Proven 2023</span>
                    </div>
                    <div class="text-end text-muted">
                        $fechaHora
                    </div>
                </div>
            </div>
        </div>
    </footer>
    FOOTER;
}
// Función herecode que determina la estructura del menú cuando un entrenador hace login
function myMenuTrainer(): void {
    echo <<<MENU
    <header>
        <nav class="navbar navbar-expand-lg border-bottom border-2 border-black mb-5" style="background-color:greenyellow;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homeEntrenador.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="listarJugadores.php">Listar jugadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="frasesMotivadoras.php">Frases motivadoras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="src/logout.php">Recuento de Votos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="src/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    MENU;
}
