<?php

class Videoclub {
    private string $nombre;
    /** @var Soporte[] */
    private array $productos = [];
    private int $numProductos;
    /** @var Cliente[] */
    private array $socios = [];
    private int $numSocios;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto): void {
        $this->productos[] = $producto;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion) {
        $cintaVideo = new CintaVideo($titulo, $this->numProductos++, $precio, $duracion);
    }
}