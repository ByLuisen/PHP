<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Maurice Ndour', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row my-5">
        <div class="text-center">
            <img src="../images/jugadores/157167pre7437.jpg" alt='Maurice Ndour'>
            <p>Maurice Ndour</p>
        </div>
    </div>
</div>
</body>