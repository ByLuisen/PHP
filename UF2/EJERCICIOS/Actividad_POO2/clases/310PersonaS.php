<?php

namespace Ejercicio310;

class Persona
{
    protected string $nombre;
    protected string $apellidos;
    protected int $edad;

    public function __construct(string $nombre, string $apellidos, int $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): void
    {
        $this->edad = $edad;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }

    public function toHtml(): string
    {
        $html = '<p>';
        $html .= 'Nombre: ' . $this->getNombreCompleto() . '<br>';
        $html .= 'Edad: ' . $this->getEdad() . '<br>';
        $html .= '</p>';
        return $html;
    }

    public function __toString(): string
    {
        return "Nombre: " . $this->nombre . " " . $this->apellidos
            . " Edad: " . $this->edad . ".<br>";
    }
}
