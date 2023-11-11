<?php
function calcularEdad($fechaNacimiento): int
{
    // Convertir la fecha de nacimiento a un objeto DateTime
    $fechaNacimientoFormateada = DateTime::createFromFormat('d/m/Y', $fechaNacimiento);

    // Obtener la fecha actual
    $fecha_actual = new DateTime();

    // Calcular la diferencia en años
    $diferencia = $fecha_actual->diff($fechaNacimientoFormateada);
    $edad = $diferencia->y;

    return $edad;
}
