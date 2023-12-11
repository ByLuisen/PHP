<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Fabien Causeur', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row my-5">
        <div class="text-center">
            <img src="../images/jugadores/154806pre7230.jpg" alt='Fabien Causeur'>
            <p>Fabien Causeur</p>
        </div>
    </div>
</div>
</body>