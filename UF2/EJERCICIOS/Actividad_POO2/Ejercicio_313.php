<?php

use Ejercicio312\Empresa;
use Ejercicio312\Empleado;
use Ejercicio312\Gerente;

require_once('clases/313Empresa.php');
require_once('clases/312Persona.php');
require_once('clases/312Trabajador.php');
require_once('clases/312Empleado.php');
require_once('clases/312Gerente.php');

$empresa = new Empresa('Mi Empresa', 'Calle Principal 123');

$empleado1 = new Empleado('John', 'Doe', 25, 40, 20);
$gerente1 = new Gerente('Jane', 'Doe', 30, 5000, 10);

$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($gerente1);

echo $empresa->listarTrabajadoresHtml();
echo 'Coste total en nóminas: $' . $empresa->getCosteNominas();
