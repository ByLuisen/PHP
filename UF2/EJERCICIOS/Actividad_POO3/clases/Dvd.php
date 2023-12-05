<?php

include_once('Soporte.php');

class Dvd extends Soporte {
    public string $idiomas;
    private string $formatoPantalla;

    public function __construct(string $titulo, int $numero, float $precio, string $idiomas, string $formatoPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(): void
    {
        echo "Película en DVD:<br>";
        parent::muestraResumen();
        echo "<p style='margin: 0;'>Idiomas: {$this->idiomas}</p>";
        echo "<p style='margin: 0;'>Foramto Pantalla: {$this->formatoPantalla}</p>";
    }
}