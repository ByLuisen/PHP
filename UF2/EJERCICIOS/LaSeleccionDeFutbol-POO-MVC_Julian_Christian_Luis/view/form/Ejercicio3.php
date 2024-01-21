<?php
//Generar plantilla de la carta con etiquetas <pre>
$carta = generarPlantillaCarta(true);
//Generar archivo index.view.html con el contenido de las cartas de cada jugador 
generarVistaHTML(generarCartas($carta, $content));
include("index.view.html");