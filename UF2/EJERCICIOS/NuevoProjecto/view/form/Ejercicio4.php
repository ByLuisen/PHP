<?php
//Generar plantilla de la carta con etiquetas <pre>
$carta = generarPlantillaCarta(true);
//Generar cartas de los jugadores
$cartasJugadores = generarCartas($carta, $content);
//Generar un HTML para cada carta de los jugadores
generarHTMLS($cartasJugadores);
/* Generar un HTML con un indice con los enlaces de cada carta HTML 
anteriormente creados */
generarIndexHTML($content);
//Redirigimos la página al index.html creado
include("index.html");
