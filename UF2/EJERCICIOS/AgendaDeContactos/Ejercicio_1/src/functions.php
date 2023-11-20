<?php
declare(strict_types=1);

/**
 * Función que calcula la edad 
 * @param string $fechaNacimiento Fecha de la cual se desea 
 * obtener la edad 
 * @return int $edad 
 */
function calcularEdad(string $fechaNacimiento): int
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

/**
 * Función que compara edades
 * @param Contacto $a primer contacto a comparar
 * @param Contacto $b segundo contacto a comparar
 * @return int positivo si $a es mayor que $a, negativo si $b es mayor que $a
 * o igual si $a y $b son iguales
 */
function compararPorEdad(Contacto $a, Contacto $b): int {
    return $a->getEdad() - $b->getEdad();
}
