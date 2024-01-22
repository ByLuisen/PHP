<?php
class Jugador
{
    // Atributos de la clase
    private $id;
    private $nombre;
    private $pais;
    private $dorsal;
    private $nacimiento;
    private $posicion;
    private $goles;
    private $partidos;

    public function __construct($id=NULL,$nombre = NULL, $pais = NULL, $dorsal = NULL, $nacimiento = NULL, $posicion = NULL, $goles = NULL, $partidos = NULL)
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->dorsal = $dorsal;
        $this->nacimiento = $nacimiento;
        $this->posicion = $posicion;
        $this->goles = $goles;
        $this->partidos = $partidos;
    }

    
    // Getters

    public function getId(){
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getDorsal()
    {
        return $this->dorsal;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getPosicion()
    {
        return $this->posicion;
    }

    public function getGoles()
    {
        return $this->goles;
    }

    public function getPartidos()
    {
        return $this->partidos;
    }

    // Setters
    public function setId($id){
        $this->id=$id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function setDorsal($dorsal)
    {
        $this->dorsal = $dorsal;
    }

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }

    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }

    public function setGoles($goles)
    {
        $this->goles = $goles;
    }

    public function setPartidos($partidos)
    {
        $this->partidos = $partidos;
    }

    /**
     * Calcula la edad a partir de una fecha de nacimiento.
     *
     * Esta función toma una fecha de nacimiento en el formato 'd/m/Y', la convierte en un objeto DateTime,
     * obtiene la fecha actual, calcula la diferencia en años y devuelve la edad obtenida.
     *
     * @param string $fecha_nacimiento La fecha de nacimiento en formato 'd/m/Y'.
     * @return int La edad calculada.
     */
    function getEdad(): int
    {
        // Convertir la fecha de nacimiento a un objeto DateTime
        $fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $this->nacimiento);

        // Obtener la fecha actual
        $fecha_actual = new DateTime();

        // Calcular la diferencia en años
        $diferencia = $fecha_actual->diff($fecha_nacimiento);
        $edad = $diferencia->y;
        //Devolver la edad obtenida
        return $edad;
    }

    /**
     * @return string
     */
    public function writingNewLine()
    { // Sería como un toString
        return "\n$this->id,$this->nombre,$this->pais,$this->dorsal,$this->nacimiento,$this->posicion,$this->goles,$this->partidos";
    }
}
