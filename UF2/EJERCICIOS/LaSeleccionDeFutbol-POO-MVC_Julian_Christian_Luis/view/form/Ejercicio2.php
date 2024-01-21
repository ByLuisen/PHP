<?php
$carta = generarPlantillaCarta(true);
//Obtener los nombres de los jugadores
?>
<div class="container">
    <div class="row mb-4">
        <div class="text-center">
            <h1>EJERCICIO 2</h1>
        </div>
    </div>
    <div class="row mb-4">
        <div>
            <?php
            /* Generamos las cartas y las mostramos mediante la obtención del contenido de
                cada carta */
            echo obtenerContenidoCartas(generarCartas($carta, $content));
            ?>
        </div>
    </div>
</div>