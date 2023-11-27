<?php

namespace Ejercicio312;

class Empleado extends Trabajador
{
    private float $horasTrabajadas;
    private float $precioHora;

    public function __construct(string $nombre, string $apellidos, int $edad, float $horasTrabajadas, float $precioHora)
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->precioHora = $precioHora;
    }

    public function calcularSueldo(): float
    {
        return $this->horasTrabajadas * $this->precioHora;
    }

    public function toHtml(): string
    {
        $html = '<p>';
        $html .= 'Empleado <br>';
        $html .= 'Nombre: ' . $this->getNombreCompleto() . '<br>';
        $html .= 'Edad: ' . $this->getEdad() . '<br>';
        $html .= 'Salario: ' . $this->calcularSueldo() . '<br>';
        $html .= '</p>';
        return $html;
    }

    public function __toString(): string
    {
        return "Empleado " . parent::__toString() . " Horas trabajadas: " . $this->horasTrabajadas .
            ", Precio hora: " . $this->precioHora . ", Sueldo: " . $this->calcularSueldo() . ".<br>";
    }
}
