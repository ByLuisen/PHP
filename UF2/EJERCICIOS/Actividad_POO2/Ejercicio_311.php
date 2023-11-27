<?php

use Ejercicio311\Empleado;
require_once('clases/311PersonaA.php');
require_once('clases/311EmpleadoA.php');

echo '<h2>Ejercicio 311</h2>';

$persona = new Empleado('John', 'Doe', 25);
$empleado = new Empleado('Jane', 'Doe', 28, 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

echo $persona->toHtml();
echo $empleado->toHtml();