<?php

class JugadorFormValidation {

    const ADD_FIELDS = array('id','nombre','pais','dorsal','nacimiento','posicion','goles','partidos');
    const MODIFY_FIELDS = array('id','nombre','pais','dorsal','nacimiento','posicion','goles','partidos');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');
    
    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Zñ]/";
    const FECHA = "/^\d{4}-\d{2}-\d{2}$/";
    
    public static function checkData($fields) {
        $id=NULL;
        $nombre=NULL;
        $pais=NULL;
        $dorsal=NULL;
        $nacimiento=NULL;
        $posicion=NULL;
        $goles=NULL;
        $partidos=NULL;
        
        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id=trim(filter_input(INPUT_POST, 'id'));
                    $idValid=!preg_match(self::NUMERIC, $id);
                    if (empty($id)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_id']);
                    }
                    else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'nombre':
                    $nombre=trim(filter_input(INPUT_POST, 'nombre'));
                    $nombreValid=!preg_match(self::ALPHABETIC, $nombre);
                    if (empty($nombre)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_nombre']);
                    }
                    else if ($nombreValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_nombre']);
                    }
                break;
                case 'pais':
                    $pais=trim(filter_input(INPUT_POST, 'pais'));
                    $paisValid=!preg_match(self::ALPHABETIC, $pais);
                    if (empty($pais)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_pais']);
                    }
                    else if ($paisValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_pais']);
                    }
                break;
                case 'dorsal':
                    $dorsal=trim(filter_input(INPUT_POST, 'dorsal'));
                    $dorsalValid=!preg_match(self::NUMERIC, $dorsal);
                    if (empty($dorsal)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_dorsal']);
                    }
                    else if ($dorsalValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_dorsal']);
                    }
                break;
                case 'nacimiento':
                    $nacimiento=trim(filter_input(INPUT_POST, 'nacimiento'));
                    $nacimientoValid=!preg_match(self::FECHA, $nacimiento);
                    if (empty($nacimiento)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_nacimiento']);
                    }
                    else if ($nacimientoValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_nacimiento']);
                    }
                break;
                case 'posicion':
                    $posicion=trim(filter_input(INPUT_POST, 'posicion'));
                    $posicionValid=!preg_match(self::ALPHABETIC, $posicion);
                    if (empty($posicion)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_posicion']);
                    }
                    else if ($posicionValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_posicion']);
                    }
                break;
                case 'goles':
                    $goles=trim(filter_input(INPUT_POST, 'goles'));
                    $golesValid=!preg_match(self::NUMERIC, $goles);
                    if (empty($goles)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_goles']);
                    }
                    else if ($golesValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_goles']);
                    }
                break;
                case 'partidos':
                    $partidos=trim(filter_input(INPUT_POST, 'partidos'));
                    $partidosValid=!preg_match(self::NUMERIC, $partidos);
                    if (empty($goles)) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['empty_partidos']);
                    }
                    else if ($partidosValid == FALSE) {
                        array_push($_SESSION['error'], JugadorMessage::ERR_FORM['invalid_partidos']);
                    }
                break;
            }
        }
        
        $jugador=new Jugador($id, $nombre, $pais, $dorsal, $nacimiento, $posicion, $goles, $partidos);
        
        return $jugador;
    }
    
}
