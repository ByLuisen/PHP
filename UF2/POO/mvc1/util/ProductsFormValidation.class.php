<?php

class ProductsFormValidation
{
    const ADD_FIELDS = array('id', 'marca', 'name', 'descripcion', 'precio', 'stock');
    const MODIFY_FIELDS = array('id', 'marca', 'name', 'descripcion', 'precio', 'stock');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');

    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z]/";
    const ALPHANUMERIC = "/[^a-zA-Z0-9 ]/";

    public static function checkData($fields)
    {
        $id = NULL;
        $marca = NULL;
        $name = NULL;
        $descripcion = NULL;
        $precio = NULL;
        $stock = NULL;

        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    $idValid = !preg_match(self::NUMERIC, $id);
                    if (empty($id)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_id']);
                    } else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'marca':
                    $marca = trim(filter_input(INPUT_POST, 'marca'));
                    $marcaValid = !preg_match(self::ALPHABETIC, $marca);
                    if (empty($marca)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_marca']);
                    } else if ($marcaValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_marca']);
                    }
                    break;
                case 'name':
                    $name = trim(filter_input(INPUT_POST, 'name'));
                    $nameValid = !preg_match(self::ALPHANUMERIC, $name);
                    if (empty($name)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_name']);
                    } else if ($nameValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_name']);
                    }
                    break;
                case 'descripcion':
                    $descripcion = trim(filter_input(INPUT_POST, 'descripcion'));
                    $descripcionValid = !preg_match(self::ALPHABETIC, $descripcion);
                    if (empty($descripcion)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_descripcion']);
                    } else if ($descripcionValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_descripcion']);
                    }
                    break;
                case 'precio':
                    $precio = trim(filter_input(INPUT_POST, 'precio'));
                    $precioValid = !preg_match(self::NUMERIC, $precio);
                    if (empty($precio)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_precio']);
                    } else if ($precioValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_precio']);
                    }
                    break;
                case 'stock':
                    $stock = trim(filter_input(INPUT_POST, 'stock'));
                    $stockValid = !preg_match(self::NUMERIC, $stock);
                    if (empty($stock)) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['empty_stock']);
                    } else if ($stockValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_stock']);
                    }
                    break;
                case 'xx':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    $idValid = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
                    if ($idValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'xx':
                    $name = trim(filter_input(INPUT_POST, 'name'));
                    $nameValid = filter_var($name, FILTER_SANITIZE_STRING);
                    if ($nameValid == FALSE) {
                        array_push($_SESSION['error'], ProductsMessage::ERR_FORM['invalid_name']);
                    }
                    break;
            }
        }

        $product = new Product($id, $marca, $name, $descripcion, $precio, $stock);

        return $product;
    }
}
