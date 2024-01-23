<?php
/**
 * Clase Books
 * @author Luis Enrique
 */
class Book
{
    // Atributos de la clase
    private $isbn;
    private $title;
    private $descripcion;
    private $autor;
    private $publicationDate;


    // Constructor
    public function __construct($isbn = NULL, $title = NULL, $descripcion = NULL
    , $autor = NULL, $publicationDate = NULL)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->descripcion = $descripcion;
        $this->autor = $autor;
        $this->publicationDate = $publicationDate;
    }

    // Getters
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getAutor() {
        return $this->autor;
    }


    public function getPublicationDate() {
        return $this->publicationDate;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }
    
    /**
     * Devuelve una cadena de texto que representa los atributos del entrenador en un formato específico.
     * El formato de la cadena es: "nombre;ciudad;fechaNacimiento;anyosDeEntrenador;nivelLiderazgo;"
     *
     * @return string La cadena formateada con los atributos del entrenador.
     */
    public function writingNewLine()
    {
        return "\n$this->isbn,$this->title,$this->descripcion,$this->autor,$this->publicationDate";
    }
}
