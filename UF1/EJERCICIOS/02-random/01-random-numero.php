<?php
/*Crea una página que muestre un número éntero aleatorio
entre 1 y 100
Otro número float aleatroio entre 0 y 5
*/

$min = 1;
$max = 100;

$numero_aleatorio = (mt_rand($min, $max));
echo "Entero: " . $numero_aleatorio . "<br>";

$min = 0;
$max = 5;

$numero_aleatorio = $min + ($max - $min) * (mt_rand() / mt_getrandmax());
$numero_aleatorio_formateado = number_format($numero_aleatorio, 2);
echo "Float: " . $numero_aleatorio_formateado . "<br>";
