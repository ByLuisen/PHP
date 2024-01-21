<?php
//crido de manera general tot el que necessitaré cridar

require_once "view/EntrenadorView.class.php";
require_once "model/persist/EntrenadorDAO.class.php";
require_once "model/Entrenador.class.php";
require_once "util/EntrenadorMessage.class.php";
require_once "util/EntrenadorFormValidation.class.php";


class EntrenadorController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new EntrenadorView();

        // càrrega del model de dades
        $this->model = new EntrenadorDAO(); // Solo tiene un metodo, recoge el fichero al cual está vinculado
    }

    // aquest mètode el tenen tots els nostres controladors
    // serveix per saber en quin lloc del menú estem

    public function processRequest()
    {

        //inicialitzem 3 variables que necessitarem
        $request = NULL; //aquest NULL serveix per al cas que sigui la primera vegada que hi entrem
        // sinó valdrà $_POST["action"] o $_GET["option"]
        $_SESSION['info'] = array(); //per donar sortida a tots els missatges generals d'informació
        $_SESSION['error'] = array(); ////per donar sortida a tots els missatges d'error

        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions.
        $request = isset($_POST["action"]) ? $_POST["action"] : NULL; // Si hay valor en el POST (formulario), ponlo 
        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) { // Si no viene por el post, pasa el enlace por la URL (GET)
            $request = $_GET["option"];
        }


        //mirem totes les opcions d'action o d'option ASSIGNADES a la variable $request
        switch ($request) {
            case "ejercicio5":
                $this->ejercicio5();
                break;
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe EntrenadorView.class.php
        }
    }

    //carrega el llistat de totes les categories
    public function ejercicio5()
    {
        $Entrenadors = array(); // Crea un array de entrenadores vacío
        //necessitem cridar al model
        $Entrenadors = $this->model->listAll(); // Añado al array objetos Entrenador

        if (!empty($Entrenadors)) {
            $_SESSION['info'] = EntrenadorMessage::INF_FORM['found']; // Añade en el array  antes generado ['info'] un ['found'] (encontrado)
        } else {
            $_SESSION['error'] = EntrenadorMessage::ERR_FORM['not_found']; // Añade en el array antes generado ['error'] un ['not_found']
        }

        $this->view->display("view/form/Ejercicio5.php", $Entrenadors); // Va a la vista y llama al metodo display para imprimir como
        // "template" el formulario de  categorias
    }
}
