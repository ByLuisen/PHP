<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('F. San Emeterio', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-12 mb-5">
            <img src="../images/jugadores/156930pre7500.jpg" alt='F. San Emeterio'>
            <p>F. San Emeterio</p>
        </div>
    </div>
</div>
</body>