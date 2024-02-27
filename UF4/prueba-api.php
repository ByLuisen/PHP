<?php
// Información
$relojes = [
    [
        'marca' => 'Marea',
        'origen' => 'Spain'
    ],
    [
        'marca' => 'Rolex',
        'origen' => 'Suiza'
    ],
    [
        'marca' => 'Omega',
        'origen' => 'Suiza'
    ],
    [
        'marca' => 'Casio',
        'origen' => 'Japón'
    ]
];

// Cabecera que indica el tipo de contenido a servir
header('Content-Type: application/json');

// Convirte a JSON y lo imprime
echo json_encode($relojes);
