<?php

namespace Ejercicio312;

class Empresa
{
    private string $nombre;
    private string $direccion;
    private array $trabajadores = [];

    public function __construct(string $nombre, string $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function anyadirTrabajador(Trabajador $t): void
    {
        $this->trabajadores[] = $t;
    }

    public function listarTrabajadoresHtml(): string
    {
        $html = '<h2>' . $this->nombre . '</h2>';
        $html .= '<p>Dirección: ' . $this->direccion . '</p>';
        $html .= '<h3>Trabajadores:</h3>';

        foreach ($this->trabajadores as $trabajador) {
            $html .= $trabajador->toHtml();
        }

        return $html;
    }

    public function getCosteNominas(): float
    {
        $costeTotal = 0;

        foreach ($this->trabajadores as $trabajador) {
            $costeTotal += $trabajador->calcularSueldo();
        }

        return $costeTotal;
    }
}