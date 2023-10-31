<?php

session_start();
require_once('../data/datos.php');
require_once('functions.php');
$inputs = [];
$errors = [];

define('VALIDATION_ERRORS', [
    'required' => 'El campo de %s es requerido',
    'full-name' => 'El %s introducido no es válido',
    'telefono' => 'El %s no es un número de teléfono válido',
    'correo' => 'El %s no es una dirección válida',
    'direccion' => 'La %s no es válida',
    'codigo-postal' => 'El %s no es un código válido',
    'ciudad' => 'La %s no es válida',
    'provincia' => 'La %s no es válida',
    'numeroTarjeta' => 'El %s no es un número válido',
    'nombreTarjeta' => 'El %s no es un nombre válido',
    'codigoSeguridadTarjeta' => 'El %s no es un código de seguridad válido.',
    'cantidadVaper' => 'Por favor, ingrese una cantidad válida para el vaper personalizado.',
    'complemento' => 'No se ha seleccionado ninguna opción.',
]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación y saneamiento del campo "Nombre Completo"
    if (isset($_POST['full-name'])) {
        $full_name = htmlspecialchars($_POST['full-name'], ENT_QUOTES, 'UTF-8');

        if (!empty($full_name)) {
            // Validar el nombre si es necesario
            if (preg_match("/^[\p{L}' ]+$/u", $full_name)) {
                $inputs['full-name'] = trim($full_name);;
            } else {
                $errors['full-name'] = sprintf(VALIDATION_ERRORS['full-name'], ucfirst('nombre'));
            }
        } else {
            $errors['full-name'] = sprintf(VALIDATION_ERRORS['required'], 'nombre');
        }
    }

    // Validación y saneamiento del campo "Número de teléfono"
    if (isset($_POST['telefono'])) {
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);

        // Verifica si el número de teléfono tiene el formato válido
        if (!empty($telefono)) {
            // El número de teléfono tiene 9 dígitos, que es un formato común
            if (preg_match('/^\d{9}$/', $telefono)) {
                if (filter_var($telefono, FILTER_VALIDATE_INT)) {
                    $inputs['telefono'] = trim($telefono);
                } else {
                    $errors['telefono'] = sprintf(VALIDATION_ERRORS['telefono'], 'número');
                }
            } else {
                $errors['telefono'] = sprintf(VALIDATION_ERRORS['telefono'], 'número');
                // $errors['telefono'] = 'El número debe tener 10 dígitos numéricos.';
            }
        } else {
            $errors['telefono'] = sprintf(VALIDATION_ERRORS['required'], 'número');
        }
    }

    // Validación y saneamiento del campo "Correo"
    if (isset($_POST['correo'])) {
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

    // Validación y saneamiento del campo "Línea de dirección 1"
    if (isset($_POST['direccion'])) {
        $direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8');

        if (!empty($direccion)) {
            if (preg_match('/^.{10,}$/', $direccion)) {
                // La dirección tiene almenos 5 caracteres
                $inputs['direccion'] = trim($direccion);
            } else {
                $errors['direccion'] = sprintf(VALIDATION_ERRORS['direccion'], 'direccion');
            }
        } else {
            $errors['direccion'] = sprintf(VALIDATION_ERRORS['required'], 'direccion');
        }
    }

    // Validación y saneamiento del campo "Código postal"
    if (isset($_POST['codigo-postal'])) {
        $codigo_postal = filter_input(INPUT_POST, 'codigo-postal', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($codigo_postal)) {
            // Puedes realizar validaciones adicionales para el código postal según tus requisitos
            if (preg_match('/^\d{5}$/', $codigo_postal)) {
                if (filter_var($codigo_postal, FILTER_VALIDATE_INT)) {
                    $inputs['codigo-postal'] = trim($codigo_postal);
                } else {
                    $errors['codigo-postal'] = sprintf(VALIDATION_ERRORS['codigo-postal'], 'codigo postal');
                }
            } else {
                $errors['codigo-postal'] = sprintf(VALIDATION_ERRORS['codigo-postal'], 'codigo postal');
            }
        } else {
            $errors['codigo-postal'] = sprintf(VALIDATION_ERRORS['required'], 'codigo postal');
        }
    }

    // Validación y saneamiento del campo "Ciudad"
    if (isset($_POST['ciudad'])) {
        $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'UTF-8');

        if (!empty($ciudad)) {
            // Puedes realizar validaciones adicionales para la ciudad según tus requisitos
            if (preg_match("/^[\p{L}' ]+$/u", $ciudad)) {
                $inputs['ciudad'] = trim($ciudad);
            } else {
                $errors['ciudad'] = sprintf(VALIDATION_ERRORS['ciudad'], 'ciudad');
            }
        } else {
            $errors['ciudad'] = sprintf(VALIDATION_ERRORS['required'], 'ciudad');
        }
    }

    // Validación del campo "Provincia" sin realizar saneamiento adicional
    if (isset($_POST['provincia'])) {
        $provincia = htmlspecialchars($_POST['provincia'], ENT_QUOTES, 'UTF-8');

        // Puedes realizar validaciones adicionales para la provincia según tus requisitos
        if (!empty($provincia)) {
            if (preg_match("/^[\p{L}' ]+$/u", $provincia)) {
                $inputs['provincia'] = trim($provincia);
            } else {
                $errors['provincia'] = sprintf(VALIDATION_ERRORS['provincia'], 'provincia');
            }
        } else {
            $errors['provincia'] = sprintf(VALIDATION_ERRORS['required'], 'provincia');
        }
    }

    //------------------------------------------------------- VAIDAR CAMPOS MÉTODO DE PAGO -------------------------------------------------------

    // Validación y saneamiento del campo "Número de tarjeta"
    if (isset($_POST['numeroTarjeta'])) {
        $numeroTarjeta = filter_input(INPUT_POST, 'numeroTarjeta', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($numeroTarjeta)) {
            // Puedes realizar validaciones adicionales para el número de tarjeta según tus requisitos
            if (preg_match('/^\d{16}$/', $numeroTarjeta)) {
                if (filter_var($numeroTarjeta, FILTER_VALIDATE_INT)) {
                    $inputs['numeroTarjeta'] = trim($numeroTarjeta);
                } else {
                    $errors['numeroTarjeta'] = 'El número de tarjeta no és válido';
                }
            } else {
                $errors['numeroTarjeta'] = sprintf(VALIDATION_ERRORS['numeroTarjeta'], 'numero de la tarjeta');
            }
        } else {
            $errors['numeroTarjeta'] = sprintf(VALIDATION_ERRORS['required'], 'numero de la tarjeta');
        }
    }

    // Validación y saneamiento del campo "Nombre en la tarjeta"
    if (isset($_POST['nombreTarjeta'])) {
        $nombreTarjeta = htmlspecialchars($_POST['nombreTarjeta'], ENT_QUOTES, 'UTF-8');
        if (!empty($nombreTarjeta)) {
            if (preg_match("/^[\p{L}' ]+$/u", $nombreTarjeta)) {
                $inputs['nombreTarjeta'] = trim($nombreTarjeta);
            } else {
                $errors['nombreTarjeta'] = sprintf(VALIDATION_ERRORS['nombreTarjeta'], 'nombre de la tarjeta');
            }
        } else {
            $errors['nombreTarjeta'] = sprintf(VALIDATION_ERRORS['required'], 'nombre de la tarjeta');
        }
    }

    // Validación y saneamiento del campo "mes Vencimiento"
    $selected_mes = filter_input(
        INPUT_POST,
        'mesVencimiento',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );

    $_SESSION['selected_mes'] = [];

    foreach ($selected_mes as $mes) {
        $_SESSION['selected_mes'][] = $mes;
    }

    // Validación y saneamiento del campo "anyo Vencimiento"
    $selected_anyo = filter_input(
        INPUT_POST,
        'anyoVencimiento',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );

    $_SESSION['selected_anyo'] = [];

    foreach ($selected_anyo as $anyo) {
        $_SESSION['selected_anyo'][] = $anyo;
    }



    $_SESSION['selected_ciudad'] = [];

    foreach ($selected_ciudad as $ciudad) {
        $_SESSION['selected_ciudad'][] = $ciudad;
    }


    $selected_provincia = filter_input(
        INPUT_POST,
        'seleccionProvincia',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );

    $_SESSION['selected_provincia'] = [];

    foreach ($selected_provincia as $provincia) {
        $_SESSION['selected_provincia'][] = $provincia;
    }


    // Validación y saneamiento del campo "Código de Seguridad de la Tarjeta"
    if (isset($_POST['codigoSeguridadTarjeta'])) {
        $codigoSeguridadTarjeta = filter_input(INPUT_POST, 'codigoSeguridadTarjeta', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($codigoSeguridadTarjeta)) {
            if (preg_match('/^\d{3}$/', $codigoSeguridadTarjeta)) {
                if (filter_var($codigoSeguridadTarjeta, FILTER_VALIDATE_INT)) {
                    $inputs['codigoSeguridadTarjeta'] = trim($codigoSeguridadTarjeta);
                } else {
                    $errors['codigoSeguridadTarjeta'] = sprintf(VALIDATION_ERRORS['codigoSeguridadTarjeta'], 'CVV');
                }
            } else {
                $errors['codigoSeguridadTarjeta'] = sprintf(VALIDATION_ERRORS['codigoSeguridadTarjeta'], 'CVV');
            }
        } else {
            $errors['codigoSeguridadTarjeta'] = sprintf(VALIDATION_ERRORS['required'], 'CVV');
        }
    }

    //------------------------------------------------------- VALIDAR OFERTAS DEL DIA ------------------------------
    // sanitize the inputs
    $selected_vapers = filter_input(
        INPUT_POST,
        'vapers',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    ) ?? [];

    // select the topping names
    $vaperNombres = array_keys($vapers);

    $_SESSION['selected_vapers'] = []; // for storing selected toppings
    $total = 0; // for storing total

    // check data against the original values
    if ($selected_vapers) {
        $contador = 0;
        foreach ($selected_vapers as $vaper) {
            $contador++;
            $cantidadOferta = filter_input(INPUT_POST, "cantidadOferta$contador", FILTER_VALIDATE_INT);
            $inputs["cantidadOferta$contador"] = $cantidadOferta;
            if (in_array($vaper, $vaperNombres)) {
                $_SESSION['selected_vapers'][] = $vaper;
                $total += $vapers[$vaper] * $cantidadOferta;
                $inputs['total'] = $total;
            }
        }
    }
    if (!$_SESSION['selected_vapers']) {
        $errors['vapers'] = "No has seleccionado ningún vaper";
    }

    // Si has marcado las ofertas del día, se almacenan en un array
    if (isset($_POST['complemento']) && is_array($_POST['complemento'])) {
        $complementos = $_POST['complemento'];
        $inputs['complemento'] = $complementos;
    }

    $marcado = htmlspecialchars($_POST['vaperChecked'], ENT_QUOTES, 'UTF-8');

    if ($marcado) {

        //--------------------------------------------------------- VALIDAR CANTIDAD ---------------------------
        if (isset($_POST['cantidadVaper'])) {

            $cantidadVaper = filter_input(INPUT_POST, 'cantidadVaper', FILTER_VALIDATE_INT);

            if ($cantidadVaper > 0 || $cantidadVaper < 20) {

                if ($cantidadVaper !== false) {
                    // Realiza validaciones adicionales para la cantidad de vaper personalizado según tus requisitos
                    $inputs['cantidadVaper'] = $cantidadVaper;
                }
            } else if ($cantidadVaper < 0 || $cantidadVaper > 20) {
                $errors['cantidadVaper'] =  sprintf(VALIDATION_ERRORS['cantidadVaper']);
            }
        }

        //--------------------------------------------------------- VALIDAR SABOR ---------------------------
        $selected_sabor = filter_input(
            INPUT_POST,
            'seleccionVaper',
            FILTER_SANITIZE_STRING,
            FILTER_REQUIRE_ARRAY
        );

        $_SESSION['selected_sabor'] = [];

        foreach ($selected_sabor as $sabor) {
            $_SESSION['selected_sabor'][] = $sabor;
        }

        // Validación y saneamiento del campo "ciudad"
        $selected_ciudad = filter_input(
            INPUT_POST,
            'seleccionCiudad',
            FILTER_SANITIZE_STRING,
            FILTER_REQUIRE_ARRAY
        );

        //--------------------------------------------------------- VALIDAR COMPLEMENTOS ---------------------------
        // Verificar si se han seleccionado opciones
        if (isset($_POST['complemento']) && !empty($_POST['complemento'])) {
            // Recorrer el array de opciones seleccionadas
            foreach ($_POST['complemento'] as $opcion) {
                // Realizar las acciones necesarias con cada opción seleccionada
                echo "Opción seleccionada: " . $opcion . "<br>";
            }
        } else {
            $errors['complemento'] =  sprintf(VALIDATION_ERRORS['complemento']);
        }
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
