<?php

require_once('clases/308PersonaH.php');
require_once('clases/308EmpleadoH.php');

echo '<h2>Ejercicio 308</h2>';

$persona = new Persona('John', 'Doe');
$empleado = new Empleado('Jane', 'Doe', 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

echo Persona::toHtml($persona);
echo Empleado::toHtml($empleado);
