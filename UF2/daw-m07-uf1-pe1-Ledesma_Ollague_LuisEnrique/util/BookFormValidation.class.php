<?php
/**
 * VAlidaciones de añadri libros
 * @author Luis Enrique
 */
class BookFormValidation
{

    const ADD_FIELDS = array('isbn', 'titulo', 'descripcion', 'autor', 'publicacion');
    const MODIFY_FIELDS = array('isbn', 'titulo', 'descripcion', 'autor', 'publicacion');
    const DELETE_FIELDS = array('isbn');
    const SEARCH_FIELDS = array('isbn');

    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Zñ]/";
    const FECHA = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";


    public static function checkData($fields)
    {
        $isbn = NULL;
        $titulo = NULL;
        $descripcion = NULL;
        $autor = NULL;
        $publicacion = NULL;

        foreach ($fields as $field) {
            switch ($field) {
                case 'isbn':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $isbn = trim(filter_input(INPUT_POST, 'isbn'));
                    $isbnValid = !preg_match(self::NUMERIC, $isbn);
                    if (empty($isbn)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_isbn']);
                    } else if ($isbnValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_isbn']);
                    }
                    break;
                case 'titulo':
                    $titulo = trim(filter_input(INPUT_POST, 'titulo'));
                    $tituloValid = !preg_match(self::ALPHABETIC, $titulo);
                    if (empty($titulo)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_titulo']);
                    } else if ($tituloValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_titulo']);
                    }
                    break;
                case 'descripcion':
                    $descripcion = trim(filter_input(INPUT_POST, 'descripcion'));
                    $descripcionValid = !preg_match(self::ALPHABETIC, $descripcion);
                    if (empty($descripcion)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_descripcion']);
                    } else if ($descripcionValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_descripcion']);
                    }
                    break;
                case 'autor':
                    $autor = trim(filter_input(INPUT_POST, 'autor'));
                    $autorValid = !preg_match(self::ALPHABETIC, $autor);
                    if (empty($autor)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_autor']);
                    } else if ($autorValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_autor']);
                    }
                    break;
                case 'publicacion':
                    $publicacion = trim(filter_input(INPUT_POST, 'publicacion'));
                    $publicacionValid = !preg_match(self::FECHA, $publicacion);
                    if (empty($publicacion)) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['empty_publicacion']);
                    } else if ($publicacionValid == FALSE) {
                        array_push($_SESSION['error'], BookMessage::ERR_FORM['invalid_publicacion']);
                    }
                    break;
            }
        }

        $libro = new Book($isbn, $titulo, $descripcion, $autor, $publicacion);

        return $libro;
    }
}
