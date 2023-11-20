<?php
// Inicia la sesision
session_name('AltaContacto');
session_start();

// Requiere de los archivos necesarios
require_once('functions.php');
require_once('errorMessages.php');
require_once('../Contacto.php');

// Inicializa los arrays para almacenar los datos del formulario
$inputs = [];
$errors = [];

define('VALIDATION_ERRORS', VALIDATION_ERRORS_ES);

// Verifica si la solicitud es un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validacion y saneamiento del campo "Nombre"
    if (isset($_POST['nombre'])) {
        //Sanea y almacena el nombre
        $full_name = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
        if (!empty($full_name)) {
            if (strlen($full_name) > 1 && strlen($full_name) < 30) {
                if (preg_match("/^[\p{L}' ]+$/u", $full_name)) {
                    $inputs['nombre'] = trim($full_name);
                } else {
                    $errors['nombre'] = sprintf(VALIDATION_ERRORS['nombre'], 'nombre');
                }
            } else {
                $errors['nombre'] = 'Los apellidos debe contener entre 1 y 30 caracteres';
            }
        } else {
            $errors['nombre'] = sprintf(VALIDATION_ERRORS['required'], 'nombre');
        }
    }

    // Validacion y saneamiento del campo "Apellidos"
    if (isset($_POST['apellidos'])) {
        //Sanea y almacena los apellidos
        $apellidos = htmlspecialchars($_POST['apellidos'], ENT_QUOTES, 'UTF-8');
        if (!empty($apellidos)) {
            if (strlen($apellidos) > 1 && strlen($apellidos) < 30) {
                if (preg_match("/^[\p{L}' ]+$/u", $apellidos)) {
                    $inputs['apellidos'] = trim($apellidos);
                } else {
                    $errors['apellidos'] = sprintf(VALIDATION_ERRORS['nombre'], 'apellido');
                }
            } else {
                $errors['apellidos'] = 'Los apellidos debe contener entre 1 y 30 caracteres';
            }
        } else {
            $errors['apellidos'] = sprintf(VALIDATION_ERRORS['required'], 'apellidos');
        }
    }

    // Validación y saneamiento del campo "Fecha de Nacimiento"
    if (isset($_POST['fecha_nacimiento'])) {
        // Obtén la fecha de nacimiento del formulario
        $fecha_nacimiento_input = htmlspecialchars($_POST['fecha_nacimiento'], ENT_QUOTES, 'UTF-8');

        if (!empty($fecha_nacimiento_input)) {
            // Convertir la fecha al formato "d/m/Y"
            $fecha_valida = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento_input);
            $fecha_nacimiento = $fecha_valida ? $fecha_valida->format('d/m/Y') : null;

            if ($fecha_valida && $fecha_nacimiento) {
                // La fecha es válida, puedes almacenarla o realizar otras operaciones necesarias
                $fecha_actual = new DateTime(); // Fecha actual
                $fecha_minima = (new DateTime())->modify('-100 years'); // Hace 100 años desde la fecha actual

                if ($fecha_valida > $fecha_actual || $fecha_valida < $fecha_minima) {
                    $errors['fecha_nacimiento'] = 'La fecha de nacimiento debe ser menor o igual a la fecha actual y mayor o igual a 100 años atrás.';
                } else {
                    $inputs['fecha_nacimiento'] = $fecha_nacimiento;
                }
            } else {
                $errors['fecha_nacimiento'] = 'La fecha de nacimiento no tiene un formato válido.';
            }
        } else {
            $errors['fecha_nacimiento'] = sprintf(VALIDATION_ERRORS['required'], 'fecha de nacimiento');
        }
    }

    // Validacion y saneamiento del campo "email"
    if (isset($_POST['email'])) {
        // Sanea y valida la direccion de email
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $inputs['email'] = trim($email);
            } else {
                $errors['email'] = sprintf(VALIDATION_ERRORS['email'], 'email');
            }
        } else {
            $errors['email'] = sprintf(VALIDATION_ERRORS['required'], 'email');
        }
    }

    // Verifica si hay errores
    if (!empty($errors)) {
        // Redirige al usuario a la página anterior (el formulario) con los inputs y los errors
        redirect_with('../index.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    // Verifica si hay errores
    if (empty($errors)) {
        // Crea en nuevo objeto contacto con los datos validados
        $contacto = new Contacto($inputs['nombre'], $inputs['apellidos'], $inputs['fecha_nacimiento'], $inputs['email']);
        // Serialización del objeto contacto
        $contacto_serializado = serialize($contacto);
        // Se añade el contacto serializado al archivo "contactos.txt"
        file_put_contents('../data/contactos.txt', $contacto_serializado, FILE_APPEND);
        // Mnesaje de que el contacto ha sido dado de alta
        $_SESSION['alta'] = 'Contacto dado de alta correctamente';
        // Redirige al usuario a la página anterior (el formulario) con un mensaje de contacto dado de alta
        redirect_to('../index.php');
    }
}
