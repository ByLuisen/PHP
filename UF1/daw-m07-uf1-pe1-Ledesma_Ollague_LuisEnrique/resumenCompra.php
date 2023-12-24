<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Fichero donde se muestra el resumen de la compra de la entrada
 */
session_name('LLigaBasquet');
session_start();
require_once('src/functions-structure.php');
require_once('src/functions.php');
myHead('Resumen compra');

myMenu();
contadorVisitas();

// Almacenar la variable session 'inputs' en la variable $inputs.
if (isset($_SESSION['inputs'])) {
    $inputs = $_SESSION['inputs'];
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 text-center mt-4">
                <h3>Gracias por tu compra.</h3>
                <h3>Compra realizada correctamente</h3>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <ol>
                    <li>
                        <p class="fw-bold">Partido:</p>
                        <p><?php echo $_SESSION['selected_partido'][0] ?></p>
                    </li>
                    <li>
                        <p class="fw-bold">Zona elegida:</p>
                        <p><?php echo $_SESSION['selected_zona'][0] ?></p>
                    </li>
                    <li>
                        <p class="fw-bold">Número de entradas:</p>
                        <p><?php echo $_SESSION['selected_entradas'][0] ?></p>
                    </li>
                </ol>
            </div>
            <div class="col-1">
                <p class="fw-bold">Precio:</p>
                <p><?php echo $inputs['total'] ?> €</p>
            </div>
        </div>
    </div>
</body>