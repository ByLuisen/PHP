<?php
// Declarar el uso estricto de tipos
declare(strict_types=1);

// Nombre de la sesión
session_name('seleccionFutbol');

// Iniciar la sesión
session_start();

// Incluir archivos de funciones y datos necesarios
require_once('src/functions-structure.php');
require_once('src/functions-login.php');
require_once('src/functions.php');
require_once('data/data.php');

// Requiere iniciar sesión
require_login();

// Mostrar el encabezado
myHead('Recuento de Votos');
?>

<!-- Cuerpo del documento HTML -->

<body class="d-flex flex-column" style="height: 100vh;">
    <?php
    // Mostrar el menú del entrenador
    myMenuTrainer()
    ?>
    <div class="container">
        <div class="row my-3">
            <div class="text-center">
                <h1>Recuento de Votos</h1>
            </div>
        </div>
        <div class="row my-5">
            <div class="d-flex flex-wrap justify-content-center mb-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Frases</th>
                            <th scope='col'>Votos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Obtener frases y votos utilizando votacionDinamica
                        $frases = obtenerDataEnArray('frasesMotivadoras.txt');
                        $votos = obtenerDataEnArray('recuentoVotos.csv');

                        // Iterar sobre las frases y votos
                        for ($i = 0; $i < count($frases); $i++) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $i + 1 . "</th>";
                            echo "<td>{$frases[$i]}</td>";
                            echo "<td class='text-center'>{$votos[$i]}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php
    // Mostrar el pie de pagina
    myFooter();
    ?>
</body>