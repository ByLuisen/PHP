<?php

include_once('CintaVideo.php');
include_once('Dvd.php');
include_once('Juego.php');
include_once('Cliente.php');

class Videoclub
{
    private string $nombre;
    /** @var Soporte[] */
    private array $productos = [];
    private int $numProductos = 0;
    /** @var Cliente[] */
    private array $socios = [];
    private int $numSocios = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto): void
    {
        $this->productos[] = $producto;
        echo "Incluido soporte {$producto->getNumero()}<br>";
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion)
    {
        $cintaVideo = new CintaVideo($titulo, $this->numProductos++, $precio, $duracion);
        $this->incluirProducto($cintaVideo);
    }

    public function incluirDvd(string $titulo, float $precio, string $idiomas, string $pantalla)
    {
        $dvd = new Dvd($titulo, $this->numProductos++, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ)
    {
        $juego = new Juego($titulo, $this->numProductos++, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }

    public function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3)
    {
        $socio = new Cliente($nombre, $this->numSocios++, $maxAlquileresConcurrentes);
        $this->socios[] = $socio;
        echo "Incluido socio {$socio->getNumero()}<br>";
    }

    public function listarProductos()
    {
        echo "<br><br>Listado de los " . count($this->productos) . " productos disponibles:<br>";
        for ($i = 0; $i < count($this->productos); $i++) {
            echo $i + 1 . ".- ";
            echo $this->productos[$i]->muestraResumen();
        }
        echo "<br><br>";
    }

    public function listarSocios()
    {
        echo "Listado de los " . count($this->socios) . " socios del videoclub:<br>";
        for ($i = 0; $i < count($this->socios); $i++) {
            echo $i + 1 . ".- ";
            echo $this->socios[$i]->muestraResumen();
        }
    }

    public function alquilarSocioProducto(int $numeroCliente, int $numeroSoporte)
    {
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() == $numeroCliente) {
                $cliente = $socio;
            }
        }
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() == $numeroSoporte) {
                $soporte = $producto;
            }
        }

        $cliente->alquilar($soporte);
    }
}
