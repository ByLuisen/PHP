<?php

include_once('Soporte.php');

class CintaVideo extends Soporte
{
    private int $duracion;

    public function __construct(string $titulo, int $numero, float $precio, int $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(): void
    {
        echo "Película en VHS:<br>";
        parent::muestraResumen();
        echo "<p style='margin: 0;'>Duración: {$this->duracion} minutos</p>";
    }
}
