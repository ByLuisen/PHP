<?php

class ProductsMessage {

    const INF_FORM =
        array(
            'insert' => 'Data inserted successfully',
            'update' => 'Data updated successfully',
            'delete' => 'Data deleted successfully',
            'found'  => 'Data found',
            '' => ''
        );
    
    const ERR_FORM =
        array(
            'empty_id'      => 'Id must be filled',
            'empty_marca'   => 'Marca must be filled',
            'empty_name'    => 'Name must be filled',
            'empty_descripcion' => 'Descripcion must be filled',
            'empty_precio'  => 'Precio must be filled',
            'empty_stock'   => 'Stock must be filled',
            'invalid_id'    => 'Id must be valid values',
            'invalid_marca' => 'Marca must be valid values',
            'invalid_name'  => 'Name must be valid values',
            'invalid_descripcion' => 'Descripcion must be valid values',
            'invalid_precio'=> 'Precio must be valid values',
            'invalid_stock' => 'Stock must be valid values',
            'exists_id'     => 'Id already exists',
            'not_exists_id' => 'Id not exists',
            'not_found'     => 'No data found',
            '' => ''
        );

    const ERR_DAO =
        array(
            'insert' => 'Error inserting data',
            'update' => 'Error updating data',
            'delete' => 'Error deleting data',
            'used'   => 'No data deleted, Category in use',
            '' => ''
        );
    
}
