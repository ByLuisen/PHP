<?php
/**
 * Controllador Bokks
 * @author Luis Enrique
 */
//crido de manera general tot el que necessitaré cridar

require_once "view/BooksView.class.php";
require_once "model/persist/BooksDAO.class.php";
require_once "util/BookFormValidation.class.php";
require_once "util/BookMessage.class.php";

class BooksController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new BooksView();

        // càrrega del model de dades
        $this->model = new BooksDAO();
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
            case "list_books": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                // LoginController::requiredLogin();
                $this->listAll();
                break;
            case "add_book":
                $this->formAdd();
                break;
            case "add":
                $this->add();
                break;
            case "delete":
                $this->delete();
                break;

            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->listAll();
                break;
        }
    }
    //carrega el llistat de totes les categories
    public function listAll()
    {
        $books = array();
        //necessitem cridar al model
        $books = $this->model->listAll();

        $this->view->display("view/form/BooksList.php", $books);
    }


    // carga el formulario de añadir un libro
    public function formAdd()
    {
        $this->view->display("view/form/BooksFormAdd.php"); //li passem la variable que es diu $template a la vista CategoryView.class.php
    }

    // ejecuta la acción de insertar un libro
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $libroValid = BookFormValidation::checkData(BookFormValidation::ADD_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $libro = $this->model->searchByIsbn($libroValid->getIsbn());

            //si no hem trobat l'id...
            if (!$libro) {
                //afegim la categoria a l'arxiu
                $result = $this->model->add($libroValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = BookMessage::INF_FORM['insert'];
                    $libroValid = NULL;
                }
            } else {
                $_SESSION['error'] = BookMessage::ERR_FORM['exists_id'];
            }
        }
        $this->view->display("view/form/BooksFormAdd.php", $libroValid);
    }

    public function delete()
    {
            $libro = $this->model->searchByIsbn($_GET['isbn']);

            if (($libro)) {
                $result = $this->model->delete($libro[0]->getIsbn());

                if ($result == TRUE) {
                    $_SESSION['info'] = BookMessage::INF_FORM['delete'];
                } else {
                    $_SESSION['error'] = BookMessage::ERR_DAO['delete'];
                }
            } else {
                $_SESSION['error'] = BookMessage::ERR_FORM['not_exists_isbn'];
            }
        

        header('Location: home.php?option=list_books');
    }

    // public function formId()
    // {
    //     $this->view->display("view/form/JugadorFormSearchById.php"); //li passem la variable que es diu $template a la vista ProductsView.class.php
    // }

    // /**
    //  * Realiza la búsqueda de un jugador por su ID.
    //  *
    //  * Esta función valida los datos de búsqueda utilizando la clase JugadorFormValidation,
    //  * realiza una búsqueda en el modelo utilizando el ID validado y muestra los resultados
    //  * en la vista correspondiente. Si se encuentra un jugador, se muestra la lista de jugadores,
    //  * de lo contrario, se muestra un mensaje de error y se redirige a la página de búsqueda.
    //  *
    //  * @return void
    //  */
    // public function searchById()
    // {
    //     $jugadorValid = JugadorFormValidation::checkData(JugadorFormValidation::SEARCH_FIELDS);

    //     if (empty($_SESSION['error'])) {
    //         $jugador = $this->model->searchById($jugadorValid->getId());

    //         if (($jugador)) {
    //             $_SESSION['info'] = JugadorMessage::INF_FORM['found'];
    //             $jugadorValid = $jugador;
    //             $this->view->display("view/form/JugadoresList.php", $jugadorValid);
    //         } else {
    //             $_SESSION['error'] = JugadorMessage::ERR_FORM['not_found'];
    //             $this->view->display("view/form/JugadorFormSearchById.php", $jugadorValid);
    //         }
    //     } else {
    //         $this->view->display("view/form/JugadorFormSearchById.php", $jugadorValid);
    //     }
    // }


    // /**
    //  * Imprime todas las cartas de los jugadores 
    //  */
    // public function obtenerNombre($fichero)
    // {

    //     $jugadores = array();
    //     $nombres = array();
    //     //necessitem cridar al model
    //     $jugadores = $this->model->listAll();
    //     if (!empty($jugadores)) { // array void or array of Category objects?
    //         foreach ($jugadores as $jugador) {
    //             $nombres[] = $jugador->getNombre();
    //         }
    //     } else {
    //         $_SESSION['error'] = JugadorMessage::ERR_FORM['not_found'];
    //     }
    //     $this->view->display("view/form/" . $fichero . ".php", $nombres); {
    //     }
    // }

    // public function eliminarImagen($nombreImagen)
    // {
    //     $nombreArchivo = "view/img/{$nombreImagen}.png";

    //     if (file_exists($nombreArchivo)) {
    //         unlink($nombreArchivo);
    //     }
    // }

    // //aquests mètodes els deixem ara per ara així
    // public function modify()
    // {
    // }
}
