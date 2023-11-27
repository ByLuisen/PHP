<?php

namespace Ejercicio314;

include_once __DIR__ . '/../interfaces/JSerializable.php';

class Empresa implements JSerializable
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

    public function toJSON(): string
    {
        $mapa = [];
        foreach ($this as $clave => $valor) {
            $mapa[$clave] = $valor;
        }
        return json_encode($mapa);
    }

    public function toSerialize(): string
    {
        return serialize($this);
    }
}