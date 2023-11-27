<?php

use Ejercicio307\Persona;
use Ejercicio307\Empleado;

require_once('clases/307Persona.php');
require_once('clases/307Empleado.php');

echo '<h2>Ejercicio 307</h2>';

$persona = new Persona('John', 'Doe');
$empleado = new Empleado('Jane', 'Doe', 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

echo Empleado::toHtml($empleado);
