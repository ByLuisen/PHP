<?php
/*
Ejercicio:
Asigna a una variable una cadena y muestra por pantalla
-longitud:
-cadena invertida:
-cuantas palabras tiene
-cuantas 'a' contiene la cadena
-reemplaza las 'a' por 'A'
*/

$cadena = "Hola manana llovera";
echo "- Cadena: " . $cadena . "<br>";
echo "- Longitud: " . strlen($cadena) . "<br>";

echo "- Cadena invertida: " . strrev($cadena) . "<br>";

echo "- Palabras: " . str_word_count($cadena) . "<br>";

$a = substr_count($cadena, 'a') + substr_count($cadena, 'A');

echo "- La cadena contiene $a a <br>";

echo "- Reemplaza las 'a' por 'A': " . str_replace("a", "A", $cadena);
