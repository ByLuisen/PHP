<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Álex Abrines', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row my-5">
        <div class="col text-center mb-5">
            <img src="../images/jugadores/155983pre7342.jpg" alt='Álex Abrines'>
            <p>Álex Abrines</p>
        </div>
    </div>
</div>
</body>