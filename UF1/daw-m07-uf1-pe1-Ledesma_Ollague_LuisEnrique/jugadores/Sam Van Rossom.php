<?php
/**
 * Luis Enrique Ledesma Ollague
 * Plantilla para la informacación de cada jugador
 */
session_name('LLigaBasquet');
session_start();
require_once('../src/functions-structure.php');
require_once('../src/functions.php');
myHead('Sam Van Rossom', '..');

myMenu('..');
contadorVisitas();
?>

<body>
<div class="container">
    <div class="row my-5">
        <div class="text-center">
            <img src="../images/jugadores/157284pre7464.jpg" alt='Sam Van Rossom'>
            <p>Sam Van Rossom</p>
        </div>
    </div>
</div>
</body>