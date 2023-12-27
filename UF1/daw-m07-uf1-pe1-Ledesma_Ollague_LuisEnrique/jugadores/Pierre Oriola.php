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
myHead('Pierre Oriola', '..');

myMenu('..');
contadorVisitas();
?>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="text-center">
                <!-- Foto del jugador -->
                <img src="../images/jugadores/156523pre7312.jpg" alt='Pierre Oriola'>
                <!-- Nombre del jugador -->
                <p>Pierre Oriola</p>
            </div>
        </div>
    </div>
</body>