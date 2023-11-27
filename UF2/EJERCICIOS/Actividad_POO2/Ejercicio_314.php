<?php

use Ejercicio314\Empresa;
use Ejercicio314\Empleado;
use Ejercicio314\Gerente;

include 'clases/314EmpresaI.php';
include 'clases/314EmpleadoI.php';
include 'clases/314GerenteI.php';

$empleado = new Empleado('John', 'Doe', 25, 40, 20);
$gerente = new Gerente('Jane', 'Doe', 30, 5000, 10);
$empresa = new Empresa('Mi Empresa', 'Calle Principal 123');

echo $empleado->toJSON() . PHP_EOL;
echo $gerente->toSerialize() . PHP_EOL;
echo $empresa->toJSON() . PHP_EOL;
