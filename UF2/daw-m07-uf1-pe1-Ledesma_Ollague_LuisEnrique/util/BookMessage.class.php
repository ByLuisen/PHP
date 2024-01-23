<?php
/**
 * Mensajes de error al añadir libros
 * @author Luis Enrique
 */
class BookMessage
{

    const INF_FORM =
    array(
        'insert' => 'Data inserted successfully',
        'update' => 'Data updated successfully',
        'delete' => 'Data deleted successfully',
        'found' => 'Data found',
        '' => ''
    );

    const ERR_FORM =
    array(
        'empty_isbn' => 'Isbn must be filled',
        'empty_titulo' => 'Titulo must be filled',
        'empty_descripcion' => 'Descripcion must be filled',
        'empty_autor' => 'Autor must be filled',
        'empty_publicacion' => 'Publicacion must be filled',
        'invalid_isbn' => 'Isbn must be valid values',
        'invalid_titulo' => 'Titulo must be valid values',
        'invalid_descripcion' => 'Descripcion must be valid values',
        'invalid_autor' => 'Autor must be valid values',
        'invalid_publicacion' => 'Publicacion must be valid values',
        'not_exists_isbn' => 'Isbn no existe',
    );

    // Mensajes de error en la inserción en el fichero DAO
    const ERR_DAO =
    array(
        'insert' => 'Error inserting data',
        'update' => 'Error updating data',
        'delete' => 'Error deleting data',
        'used' => 'No data deleted, Product in use',
        '' => ''
    );
}
