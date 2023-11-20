<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

// Cargar el controlador y ejecutar la acción correspondiente
require_once ('controllers/ContactoController.php');
$controller = new ContactoController();

switch ($action) {
    case 'listar':
        $controller->listar();
        break;
    case 'ver':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->ver($id);
        break;
    case 'editar':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->editar($id);
        break;
    default:
        echo 'Acción no válida';
}
