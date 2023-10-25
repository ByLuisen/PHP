<?php

// Declaración de variables
$arrayIndexado = ["M06", "M07", "M08", "M09"];
$arrayAsociative1 = [
    "Asignaturas de primero" => "M01, M02, M03, M04, M05, M10, M11",
    "Asignaturas de segundo" => "M06, M07, M08, M09, M012, M13"
];
$arrayAsociative2 = [
    "Asignaturas de primero" => ["M01", "M02", "M03", "M04", "M05", "M10", "M11"],
    "Asignaturas de segundo" => ["M06", "M07", "M08", "M09", "M12", "M13"]
];

//------------------------------------------------------------------------------------------------------------
function myHeader()
{
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
                
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Impresiones de Arrays</title>
    </head>
    CABECERA;
    echo $head;
}

//------------------------------------------------------------------------------------------------------------
function myMenu()
{
    $menu = <<<HERE
            <div class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exercici1.php">Exercici 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exercici2.php">Exercici 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exercici3.php">Exercici 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exercici4.php">Exercici 4</a>
                </li>
            </ul>
            </div>
            HERE;
    echo $menu;
    echo '<hr>';
}

//------------------------------------------------------------------------------------------------------------
function myFooter()
{
    $footerHTML = <<<MYFOOTER
            <footer>
                <hr>
                <p>
                @Provençana
                </p>
            </footer>
        MYFOOTER;
    echo $footerHTML;
    date_default_timezone_set('Europe/Madrid');

    $fechaActual = date("d-m-Y");
    $horaActual = date("h:i:s");

    echo "La fecha es: $fechaActual y la hora es $horaActual ";
}

// Print Line. Appends an return at the end
//------------------------------------------------------------------------------------------------------------
function println($something): void
{
    echo $something . '<br>';
}
