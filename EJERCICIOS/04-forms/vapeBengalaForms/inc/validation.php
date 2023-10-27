<?php

$errors = [];
$inputs = [];

if (isset($_POST['submit'])) {
    // El botón "submit" se ha presionado, realizar la validación
    // Validación formulario Dirección de envío

    // validate name
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inputs['name'] = $name;
    if (!$name || trim($name) === '') {
        $errors['name'] = 'Please enter your name';
    }

    // Validación número teléfono
    $numero = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $inputs['telefono'] =  $numero;
    if (!$numero || trim($numero) === '') {
        $errors['telefono'] = 'Please enter your number';
    }

    // validate email
    $email = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $inputs['correo'] = $email;

    if (!$email) {
        $errors['correo'] = 'Por favor introduce un telefono';
    }

    // Validación formulario Método de pago
    // Validación numero de la tarjeta
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $numeroTarjeta = filter_var(trim($numeroTarjeta), FILTER_SANITIZE_NUMBER_INT);

    if (preg_match('^\d{1,16}$^', $numeroTarjeta)) {
    } else {
        $errors['numeroTarjeta'] = "El número de la tarjeta introducido no es válido";
    }

    // Validación nombre de la tarjeta
    $nombreTarjeta = $_POST['nombreTarjeta'];
    $nombreTarjeta = filter_var(trim($nombreTarjeta), FILTER_SANITIZE_NUMBER_INT);
    // TODO if preg_match
}   
