<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Plantilla donde se mostrará la foto y el nombre del jugador
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
                <!-- Foto del jugador -->
                <img src="../images/jugadores/157284pre7464.jpg" alt='Sam Van Rossom'>
                <!-- Nombre del jugador -->
                <p>Sam Van Rossom</p>
            </div>
        </div>
    </div>
</body>