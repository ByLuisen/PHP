<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Mike Tobey', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-12 mb-5">
            <img src="../images/jugadores/157188pre7473.jpg" alt='Mike Tobey'>
            <p>Mike Tobey</p>
        </div>
    </div>
</div>
</body>