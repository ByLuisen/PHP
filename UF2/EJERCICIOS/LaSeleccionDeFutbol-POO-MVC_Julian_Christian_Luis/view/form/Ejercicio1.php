<?php
$carta = generarPlantillaCarta();
?>
<div class="container">
    <div class="row">
        <div class="text-center">
            <h1>EJERCICIO 1</h1>
        </div>
    </div>
    <div class="row my-3">
        <div class="text-center">
            <?php
            //Crear las cartas y los archivos
            $archivosGeneradosOk = generarFicheros(generarCartas($carta, $content));
            /* Mostrar mensaje de error si la anterior función devolvió false, 
                si no mostrar mensaje de que todo ha salido bien */
            echo (!$archivosGeneradosOk) ? "Fallo al generar los arhivos" : "Archivos generados correctamente"
            ?>
        </div>
    </div>
</div>