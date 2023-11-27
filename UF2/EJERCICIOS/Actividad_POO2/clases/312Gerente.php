<?php

namespace Ejercicio312;

class Gerente extends Trabajador
{
    private float $salario;

    public function __construct(string $nombre, string $apellidos, int $edad, float $salario)
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->salario = $salario;
    }

    public function calcularSueldo(): float
    {
        $incremento = $this->salario * ($this->edad / 100);
        return $this->salario + $incremento;
    }

    public function toHtml(): string
    {
        $html = '<p>';
        $html .= 'Gerente <br>';
        $html .= 'Nombre: ' . $this->getNombreCompleto() . '<br>';
        $html .= 'Edad: ' . $this->getEdad() . '<br>';
        $html .= 'Salario: ' . $this->calcularSueldo() . '<br>';
        $html .= '</p>';
        return $html;
    }

    public function __toString(): string
    {
        return "Gerente " . parent::__toString() . "Salario base: " . $this->salario . ", Sueldo: " . $this->calcularSueldo() . ".<br>";
    }
}