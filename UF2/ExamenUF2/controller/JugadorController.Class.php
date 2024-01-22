<?php
//crido de manera general tot el que necessitaré cridar

require_once "controller/ControllerInterface.php";
require_once "view/JugadorView.class.php";
require_once "model/persist/JugadorDAO.class.php";
require_once "model/Jugador.class.php";

class JugadorController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new JugadorView();

        // càrrega del model de dades
        $this->model = new JugadorDAO();
    }

    // aquest mètode el tenen tots els nostres controladors
    // serveix per saber en quin lloc del menú estem

    public function processRequest()
    {

        //inicialitzem 3 variables que necessitarem
        $request = NULL; //aquest NULL serveix per al cas que sigui la primera vegada que hi entrem, sinó valdrà $_POST["action"] o $_GET["option"]
        $_SESSION['info'] = array(); //per donar sortida a tots els missatges generals d'informació
        $_SESSION['error'] = array(); ////per donar sortida a tots els missatges d'error

        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions,

        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) {
            $request = $_GET["option"];
        }


        //mirem totes les opcions d'action o d'option ASSIGNADES a la variable $request
        switch ($request) {
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->mostrarJugadores();
        }
    }

    // Crea un array de jugadores y muestra la lista
    public function mostrarJugadores()
    {
        $jugadores = array();
        //necessitem cridar al model
        $jugadores = $this->model->listAll();

        $this->view->display("view/form/MostrarSeleccion.php", $jugadores);
    }
    //carrega el llistat de totes les categories
    public function listAll()
    {
        $jugadores = array();
        //necessitem cridar al model
        $jugadores = $this->model->listAll();


        $this->view->display("view/form/JugadoresList.php", $jugadores);
    }
}
