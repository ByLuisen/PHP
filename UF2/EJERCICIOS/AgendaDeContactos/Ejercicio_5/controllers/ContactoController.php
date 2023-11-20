<?php
declare(strict_types=1);
session_name('MVCContactos');
session_start();
require_once 'models/Contacto.php';
require_once 'src/functions.php';
require_once 'src/functions-structure.php';

class ContactoController
{
    var $contactos;

    function __construct()
    {
        $this->contactos = [
            new Contacto('Luis', 'Enrique Ledesma', '3/2/2002', 'luisen32@gmail.com'),
            new Contacto('Carlos', 'Sastre Dominguez', '5/4/2001', 'carlos54@gmail.com'),
            new Contacto('Paco', 'Fernandéz Gracia', '7/9/2006', 'paco32@gmail.com')
        ];
    }

    public function listar()
    {
        $rowset = $this->contactos;

        include 'views/listado.php';
    }

    public function ver($id)
    {
        $contacto = obtenerContactoPorNombre($id, $this->contactos);

        include 'views/ver.php';
    }

    public function editar($id)
    {
        $contacto = obtenerContactoPorNombre($id, $this->contactos);

        include 'views/editar.php';
    }
}
