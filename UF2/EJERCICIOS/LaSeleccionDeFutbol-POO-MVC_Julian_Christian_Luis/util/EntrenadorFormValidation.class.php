<?php

class EntrenadorFormValidation
{

    const ADD_FIELDS = array('id', 'nombre', 'ciudad', 'fechaNacamiento', 'anyosDeEntrenador', 'nivelLiderazgo');
    const MODIFY_FIELDS = array('id', 'nombre', 'ciudad', 'fechaNacamiento', 'anyosDeEntrenador', 'nivelLiderazgo');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');

    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z]/";
    const FECHA = "/^\d{4}-\d{2}-\d{2}$/";

    public static function checkData($fields)
    {
        $id = NULL;
        $nombre = NULL;
        $ciudad = NULL;
        $fechaNacimiento =  NULL;
        $anyosEntrenador = NULL;
        $nivelLiderazgo = NULL;

        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    $idValid = !preg_match(self::NUMERIC, $id);
                    if (empty($id)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_id']);
                    } else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'nombre':
                    $nombre = trim(filter_input(INPUT_POST, 'nombre'));
                    $nombreValid = !preg_match(self::ALPHABETIC, $nombre);
                    if (empty($nombre)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_nombre']);
                    } else if ($nombreValid == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_nombre']);
                    }
                    break;
                case 'ciudad':
                    $ciudad = trim(filter_input(INPUT_POST, 'ciudad'));
                    $ciudadValid = !preg_match(self::ALPHABETIC, $ciudad);
                    if (empty($ciudad)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_ciudad']);
                    } else if ($ciudadValid == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_ciudad']);
                    }
                    break;
                case 'dorsal':
                    $dorsal = trim(filter_input(INPUT_POST, 'dorsal'));
                    $dorsalValid = !preg_match(self::NUMERIC, $dorsal);
                    if (empty($dorsal)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_dorsal']);
                    } else if ($dorsalValid == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_dorsal']);
                    }
                    break;
                case 'anyosEntrenador':
                    $anyosEntrenador = trim(filter_input(INPUT_POST, 'anyosEntrenador'));
                    $anyosEntrenador = !preg_match(self::FECHA, $anyosEntrenador);
                    if (empty($anyosEntrenador)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_anyosEntrenador']);
                    } else if ($anyosEntrenador == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_anyosEntrenador']);
                    }
                    break;
                case 'nivelLiderazgo':
                    $nivelLiderazgo = trim(filter_input(INPUT_POST, 'nivelLiderazgo'));
                    $nivelLiderazgo = !preg_match(self::NUMERIC, $nivelLiderazgo);
                    if (empty($nivelLiderazgo)) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['empty_nivelLiderazgo']);
                    } else if ($nivelLiderazgo == FALSE) {
                        array_push($_SESSION['error'], EntrenadorMessage::ERR_FORM['invalid_nivelLiderazgo']);
                    }
                    break;

            }
        }

        $entrenador = new Entrenador($id, $nombre, $ciudad, $fechaNacimiento, $anyosEntrenador, $nivelLiderazgo);
        
        return $entrenador;
    }
}
