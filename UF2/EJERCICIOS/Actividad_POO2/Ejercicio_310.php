<?php

use Ejercicio310\Persona;
use Ejercicio310\Empleado;

require_once('clases/310PersonaS.php');
require_once('clases/310EmpleadoS.php');

echo '<h2>Ejercicio 310</h2>';

$persona = new Persona('John', 'Doe', 25);
$empleado = new Empleado('Jane', 'Doe', 28, 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

echo $persona;
echo $empleado;