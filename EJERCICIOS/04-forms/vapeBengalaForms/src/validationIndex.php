<?php

session_start();
require_once('../data/datos.php');
require_once('functions.php');
$inputs = [];
$errors = [];

$inputs['total'] = 0;
$_SESSION['productos'] = [];

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
    'tamaño' => 'Selecciona almenos un tamaño de vape'
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
            if (preg_match('/^\d{9}$/', $telefono)) { // TODO cambiar el patron y validar la longitud del telefono
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
        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);

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
            if (preg_match('/^[0-9]{5}$/', $codigo_postal)) {
                $inputs['codigo-postal'] = trim($codigo_postal);
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


    $selected_ciudad = filter_input(
        INPUT_POST,
        'seleccionCiudad',
        FILTER_SANITIZE_STRING,
        FILTER_REQUIRE_ARRAY
    );

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

        foreach ($selected_vapers as $vaper) {
            $posicion = array_search($vaper, array_keys($vapers)) + 1;

            $cantidadOferta = filter_input(INPUT_POST, "cantidadOferta$posicion", FILTER_VALIDATE_INT);
            $inputs["cantidadOferta$posicion"] = $cantidadOferta;
            if (in_array($vaper, $vaperNombres)) {
                $_SESSION['selected_vapers'][] = $vaper;
                $total += $vapers[$vaper] * $cantidadOferta;
                $_SESSION['productos'][] = array(
                    'Nombre' => $vaper,
                    'Precio' => $vapers[$vaper]
                );
            }
        }
        $inputs['total'] += $total;
    }
    if (!$_SESSION['selected_vapers']) {
        $errors['vapers'] = "No has seleccionado ningún vaper";
    }

    $marcado = htmlspecialchars($_POST['vaperChecked'], ENT_QUOTES, 'UTF-8');

    $_SESSION['vaperChecked'] = [];

    if ($marcado) {
        $_SESSION['vaperChecked'][] = 'vaperChecked';

        //--------------------------------------------------------- VALIDAR CANTIDAD ---------------------------
        if (isset($_POST['cantidadVaper'])) {
            $cantidadVaper = filter_input(INPUT_POST, 'cantidadVaper', FILTER_SANITIZE_NUMBER_INT);

            if (!empty($cantidadVaper)) {
                if (filter_var($cantidadVaper, FILTER_VALIDATE_INT)) {
                    $inputs['cantidadVaper'] = $cantidadVaper;
                } else {
                    $errors['cantidadVaper'] = sprintf(VALIDATION_ERRORS['cantidadVaper']);
                }
            } else {
                $errors['cantidadVaper'] = sprintf(VALIDATION_ERRORS['required'], 'cantidad de vapers');
            }
        }

        //----------------------------------------------------------------------------------------
        // sanitize tamaños
        $tamaño = filter_input(INPUT_POST, 'tamaños', FILTER_SANITIZE_STRING);
        $_SESSION['selected_tamaño'] = []; // for storing selected tamaños
        $total = 0; // for storing total

        // check the selected value against the original values
        if ($tamaño && array_key_exists($tamaño, $tamaños)) {
            $cantidadVaper = filter_input(INPUT_POST, "cantidadVaper", FILTER_VALIDATE_INT);
            $_SESSION['selected_tamaño'][] = $tamaño;
            $total += $tamaños[$tamaño] * $cantidadVaper;
            $inputs['total'] += $total;
        } else {
            $errors['tamaño'] = sprintf(VALIDATION_ERRORS['tamaño']);
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

        if ($selected_sabor) {
            $_SESSION['productos'][] = array(
                'Sabor' => $_SESSION['selected_sabor'][0],
                'Tamaño' => $_SESSION['selected_tamaño'][0],
                'Precio' => $tamaños[$_SESSION['selected_tamaño'][0]]
            );
        }

        //--------------------------------------------------------- VALIDAR COMPLEMENTOS ---------------------------
        // sanitize the inputs
        $selected_complementos = filter_input(
            INPUT_POST,
            'complementos',
            FILTER_SANITIZE_STRING,
            FILTER_REQUIRE_ARRAY
        ) ?? [];

        // select the topping names
        $vaperComplementos = array_keys($complementos);

        $_SESSION['selected_complementos'] = []; // for storing selected toppings
        $total = 0; // for storing total

        // check data against the original values
        if ($selected_complementos) {

            foreach ($selected_complementos as $complemento) {
                if (in_array($complemento, $vaperComplementos)) {
                    $_SESSION['selected_complementos'][] = $complemento;
                    $total += $complementos[$complemento];
                    $_SESSION['productos'][] = array(
                        'Complemento' => $complemento,
                        'Precio' => $complementos[$complemento]
                    );
                }
            }
            $inputs['total'] += $total;
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
    // Verifica si hay errores
    if (empty($errors)) {
        // Redirige al usuario a la página anterior (el formulario) con un mensaje de error
        redirect_with('../ticket.php', [
            'inputs' => $inputs
        ]);
    }
}
