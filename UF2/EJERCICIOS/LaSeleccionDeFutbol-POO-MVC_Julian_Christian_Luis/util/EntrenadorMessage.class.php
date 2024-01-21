<?php

class EntrenadorMessage
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
        'empty_name' => 'Name must be filled',
        'empty_ciudad' => '',
        'empty_fechaNacimiento' => '',
        'empty_anyosEntrenador' => '',
        'empty_nivelLiderazgo' => '',
        'invalid_name' => '',
        'invalid_ciudad' => '',
        'invalid_fechaNacimiento' => '',
        'invalid_anyosEntrenador' => '',
        'invalid_nivelLiderazgo' => '',
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
