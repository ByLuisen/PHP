<?php

class Persona
{
    protected string $nombre;
    protected string $apellidos;

    public function __construct(string $nombre, string $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }

    public static function toHtml(Persona $p): string
    {
        $html = '<p>';
        $html .= 'Nombre: ' . $p->getNombreCompleto() . '<br>';
        $html .= '</p>';
        return $html;
    }
}
