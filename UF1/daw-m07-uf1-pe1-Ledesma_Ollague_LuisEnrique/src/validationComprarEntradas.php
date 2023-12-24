<?php

/**
 * @author Luis Enrique Ledesma Ollague
 * 
 * Fichero con las validaciones de comprar entradas.
 */

/**
 * Inicia la sesión de la LligaBasquet
 */
session_name('LLigaBasquet');
session_start();

/**
 * Require de los archivos necesarios
 */
require_once('../data/data.php');
require_once('functions.php');
require_once('errorMessages.php');

/** 
 * Inicializa los arrays para almacenar los datos correctos y los
 * mensajes de error
 */
$inputs = [];
$errors = [];

// Definir los mensajes de error en este caso en español
define('VALIDATION_ERRORS', VALIDATION_ERRORS_ES);

// Verifica si la solicitud es tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //---------------------------------- VALIDAR PARTIDO ----------------------------------
    $selected_partido = filter_input(
        INPUT_POST,
        'seleccionPartido',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );

    // Variable session donde se guardará el partido seleccionado.
    $_SESSION['selected_partido'] = [];

    foreach ($selected_partido as $partido) {
        $_SESSION['selected_partido'][] = $partido;
    }

    //-------------------------------- VALIDAR ZONA ESCOGIDA --------------------------------
    // Sanitize zonas
    $zona = filter_input(INPUT_POST, 'zonas', FILTER_SANITIZE_STRING);
    $_SESSION['selected_zona'] = []; // Variable session para almacenar la zona elegida

    // Se verifica que la variable $zona sea true y que exista en el array $zonas.
    if ($zona && array_key_exists($zona, $zonas)) {
        // Se alamacena en la variable session
        $_SESSION['selected_zona'][] = $zona;
        // Y se almacena el precio de la zona elegida
        $inputs['total'] += $zonas[$zona];;
    } else {
        $errors['zona'] = sprintf(VALIDATION_ERRORS['zona']);
    }

    //-------------------------------- VALIDAR CORREO --------------------------------
    // Validacion y saneamiento del campo "Correo"
    if (isset($_POST['correo'])) {
        // Sanea y valida la direccion de correo
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);

        if (!empty($correo)) {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $inputs['correo'] = trim($correo);
            } else {
                $errors['correo'] = sprintf(VALIDATION_ERRORS['correo'], 'correo');
            }
        } else {
            $errors['correo'] = sprintf(VALIDATION_ERRORS['required'], 'correo');
        }
    }

    //-------------------------- VALIDAR NÚMERO DE ENTRADAS --------------------------
    $selected_entradas = filter_input(
        INPUT_POST,
        'seleccionEntradas',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );
    // Variable session donde se guardará el número de entradas seleccionado.
    $_SESSION['selected_entradas'] = [];

    foreach ($selected_entradas as $entrada) {
        // Se guarda el número de entradas seleccionado en la variable session
        $_SESSION['selected_entradas'][] = $entrada;
        // Y se multiplica el número de entradas por el precio de la zona elegida si el $inputs['total'] no es vacio.
        (!empty([$inputs['total']])) ? $inputs['total'] *= $entrada : '';
    }

    //-------------------------- VALIDAR NÚMERO DE TELEFONO --------------------------
    // Validacion y saneamiento del campo "Numero de telefono"
    if (isset($_POST['telefono'])) {
        // Sanea y valida el numero de telefono
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);

        // Verifica si el numero de telefono tiene el formato válido
        if (!empty($telefono)) {
            // El numero de telefono tiene 9 digitos, que es un formato comun
            if (preg_match('/^\d{9}$/', $telefono)) {
                $inputs['telefono'] = trim($telefono);
            } else {
                $errors['telefono'] = (VALIDATION_ERRORS['telefono']);
            }
        } else {
            $errors['telefono'] = sprintf(VALIDATION_ERRORS['required'], 'número de teléfono');
        }
    }

    // Verifica si hay errores
    if (!empty($errors)) {
        // Si hay errores redirige al usuario a la página anterior (el formulario) con los mensajes de error
        redirect_with('../comprarEntradas.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }
    // Verifica si hay errores
    if (empty($errors)) {
        // Si no hay errores redirige al usuario a la página donde saldrá la compra realizada y el resumen
        redirect_with('../resumenCompra.php', [
            'inputs' => $inputs
        ]);
    }
}
