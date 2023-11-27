<?php


use Ejercicio312\Empleado;
use Ejercicio312\Gerente;
require_once('clases/312Persona.php');
require_once('clases/312Trabajador.php');
require_once('clases/312Empleado.php');
require_once('clases/312Gerente.php');


echo '<h2>Ejercicio 312</h2>';

$empleado = new Empleado('John', 'Doe', 25, 40, 20);
$gerente = new Gerente('Jane', 'Doe', 30, 5000, 10);

$empleado->anyadirTelefono('123-456-7890');
$gerente->anyadirTelefono('987-654-3210');

echo $empleado;
echo $gerente;