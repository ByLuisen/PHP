<?php
header('Content-Type: text/plain', true);

$years = 10;
$cadena1 = "Nuria tiene $years años \n";

print($cadena1);

$cadena2 = 'Nuria tiene ' . $years . ' años' . PHP_EOL;
echo "Mi cadena 2 es $cadena2";

// echo 'Cadena simple';  comentario de una linea

/* Comentario de varias líeas
echo 'Hola
que tal
estoy en
DAW2
En inglés "do not" se puede escribir "don\'t"
';
*/
