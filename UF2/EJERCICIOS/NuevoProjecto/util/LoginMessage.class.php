<?php

class LoginMessage
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
        'empty_usuario' => 'Usuario must be filled',
        'empty_contrasena' => 'Contrasena must be filled',
        'invalid_usuario' => 'Usuario must be valid values',
        'invalid_contasena' => 'Contrasena must be valid values',
        'not_found' => 'No data found',
        '' => ''
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
