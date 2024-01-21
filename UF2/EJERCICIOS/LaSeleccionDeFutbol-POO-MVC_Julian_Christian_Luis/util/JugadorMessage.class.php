<?php

class JugadorMessage
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
        'empty_id' => 'Id must be filled',
        'empty_nombre' => 'Nombre must be filled',
        'empty_pais' => 'Pais must be filled',
        'empty_dorsal' => 'Dorsal must be filled',
        'empty_nacimiento' => 'Nacimiento must be filled',
        'empty_posicion' => 'Posicion must be filled',
        'empty_goles' => 'Goles must be filled',
        'empty_partidos' => 'Partidos must be filled',
        'empty_imagen' => 'Imagen must be filled',
        'invalid_id' => 'Id must be valid values',
        'invalid_nombre' => 'Nombre must be valid values',
        'invalid_pais' => 'Pais must be valid values',
        'exists_id' => 'Id already exists',
        'not_exists_id' => 'Id not exists',
        'invalid_dorsal' => 'Dorsal must be valid values',
        'invalid_nacimiento' => 'Nacimiento must be valid values',
        'invalid_posicion' => 'Posicion must be valid values',
        'invalid_goles' => 'Goles must be valid values',
        'invalid_partidos' => 'Partidos must be valid values',
        'invalid_imagen' => 'Imagen must be valid',
        'tipo_archivo' => 'Tipo de archivo no permitido',
        'tamaño_archivo' => 'Tamaño de archivo no permitido',
        'error_archivo' => 'Error al subir el archivo',
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
