<?php

include_once ('interfaces/Resumible.php');

abstract class SoporteAbstracto implements Resumible
{
    public string $titulo;
    protected int $numero;
    private float $precio;
    private static float $IVA = 0.21;

    public function __construct(string $titulo, int $numero, float $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIva(): float
    {
        return number_format($this->precio * (1 + self::$IVA), 2);
    }

    public function getNumero(): float
    {
        return $this->numero;
    }

    public function muestraResumen(): void
    {
        echo "<p style='font-style: italic; margin: 0;'>{$this->titulo}</p>" .
            "<p style='margin: 0;'>{$this->precio} € (IVA no incluido)</p>";
    }
}
