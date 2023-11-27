<?php

require_once('clases/309PersonaE.php');
require_once('clases/309EmpleadoE.php');

echo '<h2>Ejercicio 309</h2>';

$persona = new Persona('John', 'Doe', 25);
$empleado = new Empleado('Jane', 'Doe', 28, 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

echo Persona::toHtml($persona);
echo Empleado::toHtml($empleado);