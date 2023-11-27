<?php

namespace Ejercicio314;

include_once __DIR__ . '/../interfaces/JSerializable.php';
include_once __DIR__ . '/314PersonaI.php';

abstract class Trabajador extends Persona implements JSerializable
{
    protected array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $edad)
    {
        parent::__construct($nombre, $apellidos, $edad);
    }

    public function anyadirTelefono(string $telefono): void
    {
        array_push($this->telefonos, $telefono);
    }

    public function listarTelefonos(): string
    {
        $telefonosSeparados = implode(', ', $this->telefonos);
        return $telefonosSeparados;
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }

    abstract public function calcularSueldo(): float;

    public function __toString(): string
    {
        return parent::__toString();
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
