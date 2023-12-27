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
myHead('Víctor Claver', '..');

myMenu('..');
contadorVisitas();
?>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="text-center">
                <!-- Foto del jugador -->
                <img src="../images/jugadores/156664pre7300.jpg" alt='Víctor Claver'>
                <!-- Nombre del jugador -->
                <p>Víctor Claver</p>
            </div>
        </div>
    </div>
</body>