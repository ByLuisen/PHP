<?php
/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Fichero con funciones de estructura de la página 
 */

/**
 * Cabecera
 */
function myHead($title, $bootstrapPath = '.'): void
{
    echo <<< HEAD
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- links to Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script> -->

    <!-- Bootstrap local links -->
    <link rel="stylesheet" href="$bootstrapPath/vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="$bootstrapPath/vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
    <title>$title</title>
    </head>

    HEAD;
}

/**
 * Barra de Menú
 */
function myMenu($filesPath = '.'): void
{
    $estil = null;
    echo <<< MENU
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: blue; height: 80px">
                <div class="container">
                    <ul class="navbar-nav f-flex justify-content-between text-white w-100 mx-5">
                        <li class="nav-item d-flex align-items-end">
                            <a href="$filesPath/index.php" class="text-decoration-none text-white"><p class="lh-1">CLUBES</p></a>
                        </li>
                        <li class="nav-item d-flex align-items-end">
                            <a class="text-decoration-none text-white"><p class="lh-1">LIGA ENDESA</p></a>
                        </li>
                        <li class="nav-item d-flex align-items-end">
                            <a class="text-decoration-none text-white"><p class="lh-1">ACB</p></a>
                        </li>
                        <li class="nav-item d-flex align-items-end">
                            <a class="text-decoration-none text-white"><p class="lh-1">COPA DEL REY</p></a>
                        </li>
                        <li class="nav-item d-flex align-items-end">
                            <a class="text-decoration-none text-white"><p class="lh-1">SUPERCOPA</p></a>
                        </li>
                        <li class="nav-item d-flex align-items-end">
                            <a class="text-decoration-none text-white"><p class="lh-1">ENDESA</p></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    MENU;
}

/**
 * Footer de la página
 */
function myFooter(): void
{
    echo <<<FOOTER
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="mb-3 mb-md-0">&copy; Bengala Spain 2023</span>
                    </div>
                    <div class="text-end" id="real-time-clock">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Función para actualizar la hora en tiempo real
        function updateClock() {
            const clockElement = document.getElementById("real-time-clock");
            const now = new Date();
            const formattedTime = now.toLocaleString("es-ES", { hour: "numeric", minute: "numeric", second: "numeric" });
            clockElement.textContent = "La fecha es: " + now.toLocaleDateString("es-ES") + " y la hora es " + formattedTime;
        }

        // Actualizar la hora cada segundo
        setInterval(updateClock, 1000);
    </script>
    FOOTER;
}
