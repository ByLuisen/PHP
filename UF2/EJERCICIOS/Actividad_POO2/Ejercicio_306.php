<?php

require_once ('clases/306EmpleadoStatic.php');

// Ejercicio 306
echo "<h2>Ejercicio 306</h2>";
$empleado = new Empleado('Juan', 'Pérez', 4000);
$empleado->anyadirTelefono('123-456-7890');
$empleado->anyadirTelefono('987-654-3210');

$html = Empleado::toHtml($empleado);
echo $html;