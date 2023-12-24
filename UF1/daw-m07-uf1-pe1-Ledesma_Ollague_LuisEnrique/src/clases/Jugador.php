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

    /**
     * Constructor de la clase Jugador
     * 
     * @param string $nombre        El nombre del jugador
     * @param int    $dorsal        El dorsal del jugador
     * @param string $club          El club del jugador
     * @param string $posicion      La posición del jugador
     * @param string $nacionalidad  La nacionalidad del jugador
     * @param string $licencia      La licencia del jugador 
     * @param string $altura        La altura del jugador
     * @param int    $edad          La edad del jugador
     * @param int    $temp          La temp del jugador
     * @param string $foto          La foto del jugador
     */
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

    /**
     * Obtiene el valor de nombre
     * 
     * @return string El nombre del jugador
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene el valor de dorsal
     * 
     * @return int El dorsal del jugador
     */
    public function getDorsal(): int
    {
        return $this->dorsal;
    }

    /**
     * Obtiene el valor de club
     * 
     * @return string El club del jugador
     */
    public function getClub(): string
    {
        return $this->club;
    }

    /**
     * Obtiene el valor de posicion
     * 
     * @return string La posición del jugador
     */
    public function getPosicion(): string
    {
        return $this->posicion;
    }

    /**
     * Obtiene el valor de nacionalidad
     * 
     * @return string La nacionalidad del jugador
     */
    public function getNacionalidad(): string
    {
        return $this->nacionalidad;
    }

    /**
     * Obtiene el valor de licencia
     * 
     * @return string La licencia del jugador
     */
    public function getLicencia(): string
    {
        return $this->licencia;
    }

    /**
     * Obtiene el valor de altura
     * 
     * @return string La altura del jugador
     */
    public function getAltura(): string
    {
        return $this->altura;
    }

    /**
     * Obtiene el valor de edad
     * 
     * @return int La edad del jugador
     */
    public function getEdad(): int
    {
        return $this->edad;
    }

    /**
     * Obtiene el valor de temp
     * 
     * @return int El temp del jugador
     */
    public function getTemp(): int
    {
        return $this->temp;
    }

    /**
     * Obtiene el valor de foto
     * 
     * @return string La foto del jugador
     */
    public function getFoto(): string
    {
        return $this->foto;
    }
}
