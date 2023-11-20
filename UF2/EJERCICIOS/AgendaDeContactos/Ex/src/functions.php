<?php
function calcularEdad($fechaNacimiento): int
{
    if ($fechaNacimiento === null) {
        throw new Exception('Fecha de nacimiento no proporcionada.');
    }

    // Convertir la fecha de nacimiento a un objeto DateTime
    $fechaNacimientoFormateada = DateTime::createFromFormat('d/m/Y', $fechaNacimiento);

    if (!$fechaNacimientoFormateada) {
        throw new Exception('Formato de fecha inválido. Se esperaba d/m/Y.');
    }

    // Obtener la fecha actual
    $fecha_actual = new DateTime();

    // Calcular la diferencia en años
    $diferencia = $fecha_actual->diff($fechaNacimientoFormateada);
    $edad = $diferencia->y;

    return $edad;
}

function compararPorEdad(Contacto $a, Contacto $b) {
    return $a->getEdad() - $b->getEdad();
}
