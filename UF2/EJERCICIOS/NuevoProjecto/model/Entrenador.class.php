<?php

class Entrenador
{
    // Atributos de la clase
    private $id;
    private $nombre;
    private $ciudad;
    private $fechaNacimiento;
    private $anyosDeEntrenador;
    private $nivelLiderazgo;

    // Constructor
    public function __construct($id = NULL, $nombre = NULL, $ciudad = NULL, $fechaNacimiento = NULL, $anyosDeEntrenador = NULL, $nivelLiderazgo = NULL)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->anyosDeEntrenador = $anyosDeEntrenador;
        $this->nivelLiderazgo = $nivelLiderazgo;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getAnyosDeEntrenador()
    {
        return $this->anyosDeEntrenador;
    }

    public function getNivelLiderazgo()
    {
        return $this->nivelLiderazgo;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setAnyosDeEntrenador($anyosDeEntrenador)
    {
        $this->anyosDeEntrenador = $anyosDeEntrenador;
    }

    public function setNivelLiderazgo($nivelLiderazgo)
    {
        $this->nivelLiderazgo = $nivelLiderazgo;
    }

    /**
     * Devuelve una cadena de texto que representa los atributos del entrenador en un formato específico.
     * El formato de la cadena es: "nombre;ciudad;fechaNacimiento;anyosDeEntrenador;nivelLiderazgo;"
     *
     * @return string La cadena formateada con los atributos del entrenador.
     */
    public function writingNewLine()
    {
        return "\n$this->id;$this->nombre;$this->ciudad;$this->fechaNacimiento;$this->anyosDeEntrenador;$this->nivelLiderazgo;";
    }
}
