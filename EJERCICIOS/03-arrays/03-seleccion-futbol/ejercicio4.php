<?php

declare(strict_types=1);
require_once('functions.php');
require_once('data.php');

//Generar plantilla de la carta con etiquetas <pre>
$carta = generarPlantillaCarta(true);
//Obtener los nombres de los jugadores
$nombres = array_keys($jugadores);
//Generar cartas de los jugadores
$cartasJugadores = generarCartas($carta, $nombres);
//Generar un HTML para cada carta de los jugadores
generarHTMLS($cartasJugadores);
/* Generar un HTML con un indice con los enlaces de cada carta HTML 
anteriormente creados */
generarIndexHTML($nombres);
//Redirigimos la página al index.html creado
header("Location:index.html");
