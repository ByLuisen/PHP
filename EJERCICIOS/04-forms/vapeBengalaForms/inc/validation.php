<?php
if (isset($_POST['submit'])) {
    // El botón "submit" se ha presionado, realizar la validación
    // Validacion nombre
    $nombreCompleto = $_POST['full-name'];
    $nombreCompleto = filter_var(trim($nombreCompleto), FILTER_SANITIZE_STRING);

    if (!preg_match('/[0-9]/', $nombreCompleto)) {
    } else {
        // El valor no es un string, muestra un mensaje de error
        $errors['full-name'] = 'El nombre itroducido es incorrecto';
    }

    // Validación número teléfono
    $numeroTelefono = $_POST['telefono'];
    $numeroTelefono = filter_var(trim($numeroTelefono), FILTER_SANITIZE_STRING);

    if (preg_match('/[0-9]/', $numeroTelefono)) {
    } else {
        // El valor introducido no tiene el formato de numero de telefono
        $errors['telefono'] = 'El número de teléfono introducido no es válido';
    }
}
