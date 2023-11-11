<?php

declare(strict_types=1);
require_once('src/functions.php');
require_once('data/data.php');

//Generar plantilla de la carta con etiquetas <pre>
$carta = generarPlantillaCarta(true);
//Obtener los nombres de los jugadores
$nombres = array_keys($jugadores);
//Generar archivo index.view.html con el contenido de las cartas de cada jugador 
generarVistaHTML(generarCartas($carta, $nombres));
header("Location: index.view.html");
