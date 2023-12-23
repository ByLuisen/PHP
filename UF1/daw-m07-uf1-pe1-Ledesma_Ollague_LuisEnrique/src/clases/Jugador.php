<?php

class Jugador
{
    private string $nombre;
    private int $dorsal;
    private string $club;
    private string $posicion;
    private string $nacionalidad;
    private string $licencia;
    private string $altura;
    private int $edad;
    private int $temp;
    private string $foto;

    public function __construct(
        string $nombre,
        int $dorsal,
        string $club,
        string $posicion,
        string $nacionalidad,
        string $licencia,
        string $altura,
        int $edad,
        int $temp,
        string $foto
    ) {
        $this->nombre = $nombre;
        $this->dorsal = $dorsal;
        $this->club = $club;
        $this->posicion = $posicion;
        $this->nacionalidad = $nacionalidad;
        $this->licencia = $licencia;
        $this->altura = $altura;
        $this->edad = $edad;
        $this->temp = $temp;
        $this->foto = $foto;
    }
}
