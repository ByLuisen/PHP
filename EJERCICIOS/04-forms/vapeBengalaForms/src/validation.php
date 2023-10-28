<?php

session_start();
$inputs = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación y saneamiento del campo "Nombre Completo"
    if (isset($_POST['full-name'])) {
        $full_name = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($full_name)) {
            // Validar el nombre si es necesario
            if (preg_match("/^[\p{L}' ]+$/u", $full_name)) {
                $inputs['full-name'] = trim($full_name);;
            } else {
                $errors['full-name'] = 'El nombre contiene caracteres no válidos.';
            }
        } else {
            $errors['full-name'] = 'El campo de nombre es requerido.';
        }
    }

    // Validación y saneamiento del campo "Número de teléfono"
    if (isset($_POST['telefono'])) {
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);

        // Puedes realizar validaciones adicionales para el número de teléfono según tus requisitos
        if (!empty($telefono)) {
            if (filter_var($telefono,)) {
                $inputs['telefono'] = $telefono;
            } else {
                $errors['telefono'] = 'El campo de nombre es requerido.';
            }
        }
    }

    // Validación y saneamiento del campo "Correo"
    if (isset($_POST['correo'])) {
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);

        if (!empty($correo)) {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $inputs['correo'] = $correo;
            } else {
                $errors['correo'] = 'Por favor, ingrese una dirección de correo electrónico válida.';
            }
        } else {
            $errors['correo'] = 'El campo de correo electrónico es requerido.';
        }
    }

    // Validación y saneamiento del campo "Línea de dirección 1"
    if (isset($_POST['direccion'])) {
        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($direccion)) {
            // Puedes realizar validaciones adicionales para la dirección según tus requisitos
            $inputs['direccion'] = $direccion;
        } else {
            $errors['direccion'] = 'El campo de dirección es requerido.';
        }
    }

    // Validación y saneamiento del campo "Código postal"
    if (isset($_POST['codigo-postal'])) {
        $codigo_postal = filter_input(INPUT_POST, 'codigo-postal', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($codigo_postal)) {
            // Puedes realizar validaciones adicionales para el código postal según tus requisitos
            $inputs['codigo-postal'] = $codigo_postal;
        }
    }

    // Validación y saneamiento del campo "Ciudad"
    if (isset($_POST['ciudad'])) {
        $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($ciudad)) {
            // Puedes realizar validaciones adicionales para la ciudad según tus requisitos
            $inputs['ciudad'] = $ciudad;
        }
    }

    // Validación del campo "Provincia" sin realizar saneamiento adicional
    if (isset($_POST['provincia'])) {
        $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_SPECIAL_CHARS);

        // Puedes realizar validaciones adicionales para la provincia según tus requisitos
        if (!empty($provincia)) {
            $inputs['provincia'] = $provincia;
        }
    }

    // Validación y saneamiento del campo "Número de tarjeta"
    if (isset($_POST['numeroTarjeta'])) {
        $numeroTarjeta = filter_input(INPUT_POST, 'numeroTarjeta', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($numeroTarjeta)) {
            // Puedes realizar validaciones adicionales para el número de tarjeta según tus requisitos
            $inputs['numeroTarjeta'] = $numeroTarjeta;
        } else {
            $errors['numeroTarjeta'] = 'El campo de número de tarjeta es requerido.';
        }
    }

    // Validación y saneamiento del campo "Nombre en la tarjeta"
    if (isset($_POST['nombreTarjeta'])) {
        $nombreTarjeta = filter_input(INPUT_POST, 'nombreTarjeta', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($nombreTarjeta)) {
            // Puedes realizar validaciones adicionales para el nombre en la tarjeta según tus requisitos
            $inputs['nombreTarjeta'] = $nombreTarjeta;
        } else {
            $errors['nombreTarjeta'] = 'El campo de nombre en la tarjeta es requerido.';
        }
    }

    // Validación del campo "Fecha de Vencimiento" (mes y año)
    if (isset($_POST['mesVencimiento']) && isset($_POST['anyoVencimiento'])) {
        $mesVencimiento = filter_input(INPUT_POST, 'mesVencimiento', FILTER_VALIDATE_INT);
        $anyoVencimiento = filter_input(INPUT_POST, 'anyoVencimiento', FILTER_VALIDATE_INT);

        // Puedes realizar validaciones adicionales para la fecha de vencimiento según tus requisitos
        if ($mesVencimiento !== false && $anyoVencimiento !== false) {
            $inputs['mesVencimiento'] = $mesVencimiento;
            $inputs['anyoVencimiento'] = $anyoVencimiento;
        } else {
            $errors['mesVencimiento'] = 'Por favor, ingrese una fecha de vencimiento válida.';
        }
    }

    // Validación y saneamiento del campo "Código de Seguridad de la Tarjeta"
    if (isset($_POST['codigoSeguridadTarjeta'])) {
        $codigoSeguridadTarjeta = filter_input(INPUT_POST, 'codigoSeguridadTarjeta', FILTER_VALIDATE_INT);

        if ($codigoSeguridadTarjeta !== false) {
            // Puedes realizar validaciones adicionales para el código de seguridad según tus requisitos
            $inputs['codigoSeguridadTarjeta'] = $codigoSeguridadTarjeta;
        } else {
            $errors['codigoSeguridadTarjeta'] = 'Por favor, ingrese un código de seguridad válido.';
        }
    }

    // Continúa validando y saneando otros campos en el mismo formulario

    // Si has marcado las ofertas del día, se almacenan en un array
    if (isset($_POST['complemento']) && is_array($_POST['complemento'])) {
        $complementos = $_POST['complemento'];
        $inputs['complemento'] = $complementos;
    }

    // Si has marcado el vaper personalizado, se valida la cantidad
    if (isset($_POST['vaper'])) {
        $cantidadVaper = filter_input(INPUT_POST, 'vaper', FILTER_VALIDATE_INT);

        if ($cantidadVaper !== false) {
            // Realiza validaciones adicionales para la cantidad de vaper personalizado según tus requisitos
            $inputs['vaper'] = $cantidadVaper;
        } else {
            $errors['vaper'] = 'Por favor, ingrese una cantidad válida para el vaper personalizado.';
        }

        // Continúa validando y saneando los otros campos relacionados con el vaper personalizado
    }

    // Verifica si hay errores
    if (!empty($errors)) {
        // Redirige al usuario a la página anterior (el formulario) con un mensaje de error
        redirect_with('../index.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }
}

function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect_to($url);
}
