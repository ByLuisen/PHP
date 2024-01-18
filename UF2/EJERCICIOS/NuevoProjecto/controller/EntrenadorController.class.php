<?php
//crido de manera general tot el que necessitaré cridar

require_once "controller/ControllerInterface.php";
require_once "view/EntrenadorView.class.php";
require_once "model/persist/EntrenadorDAO.class.php";
require_once "model/Entrenador.class.php";
require_once "util/EntrenadorMessage.class.php";
require_once "util/EntrenadorFormValidation.class.php";


class EntrenadorController implements ControllerInterface
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
            case "list_all": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->listAll();
                break;

            case "form_add": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->formAdd();
                break;

            case "add": //opció de formulari
                $this->add();
                break;
            case "form_search":
                $this->formSearchById();
                break;
            case "search_by_id":
                $this->searchById();
                break;
            case "form_modify":
                $this->formModify();
                break;
            case "modify":
                $this->modify();
                break;
            case "ejercicio5":
                $this->listAll();
                break;
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe EntrenadorView.class.php
        }
    }

    //carrega el llistat de totes les categories
    public function listAll()
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


    // carrega el formulari d'insertar Entrenadore
    public function formAdd()
    {
        $this->view->display("view/form/EntrenadorFormAdd.php"); //li passem la variable que es diu $template a la vista EntrenadorView.class.php
    }

    // ejecuta la acción de insertar Entrenadoro
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $EntrenadorValid = EntrenadorFormValidation::checkData(EntrenadorFormValidation::ADD_FIELDS);
        // check data está creado en EntrenadorFormValidation sin tener que instanciar ningun objeto

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $Entrenador = $this->model->searchById($EntrenadorValid->getId());

            //si no hem trobat l'id...
            if (is_null($Entrenador)) {
                //afegim el Entrenadore a l'arxiu
                $result = $this->model->add($EntrenadorValid);

                // Si se ha conseguido añadir el Entrenadoro...
                if ($result == TRUE) {
                    $_SESSION['info'] = EntrenadorMessage::INF_FORM['insert']; // Muestro mensaje informando que ha sido insertado con los mensajes por defecto
                    $EntrenadorValid = NULL;
                }
            } else {
                $_SESSION['error'] = EntrenadorMessage::ERR_FORM['exists_id'];
            }
        }
        $this->view->display("view/form/EntrenadorFormAdd.php", $EntrenadorValid);
    }

    /**
     * Carga el formulario de modificar categoria
     *
     * @return void
     */
    // carregaria el formulari de modificar si el programessim al menú  
    public function formModify()
    {
        $this->view->display("view/form/EntrenadorFormModify.php");
    }

    /**
     * Modifica 
     *
     * @return void
     */
    public function modify()
    {
        $EntrenadorValid = EntrenadorFormValidation::checkData(EntrenadorFormValidation::MODIFY_FIELDS);

        if (empty($_SESSION['error'])) {
            $Entrenador = $this->model->searchById($EntrenadorValid->getId());

            if (!is_null($Entrenador)) {
                // Obten la nueva marca
                $newBrand = filter_input(INPUT_POST, 'newBrand');

                // Obtén el nuevo nombre desde el formulario
                $newName = filter_input(INPUT_POST, 'newName');

                //Obtengo nueva descripcion
                $newDescription = filter_input(INPUT_POST, 'newDescription');

                // Obtengo nuevo precio
                $newPrice = filter_input(INPUT_POST, 'newPrice');

                // Obtengo la nueva cantidad de stock
                $newStock = filter_input(INPUT_POST, 'newStock');

                if (!empty($newName)) { // Verifica si el nuevo nombre no está vacío
                    $EntrenadorValid->setNombre($newName);

                    $result = $this->model->modify($EntrenadorValid);

                    if ($result == true) {
                        $_SESSION['info'] = EntrenadorMessage::INF_FORM['update'];
                    } else {
                        $_SESSION['error'] = EntrenadorMessage::ERR_FORM['update'];
                    }
                } else {
                    $_SESSION['error'] = EntrenadorMessage::ERR_FORM['empty_name'];
                }

                // Verifico si la marca no está vacía
                if (!empty($newBrand)) {
                    $EntrenadorValid->setNombre($newBrand);

                    $result = $this->model->modify($EntrenadorValid);

                    if ($result == true) {
                        $_SESSION['info'] = EntrenadorMessage::INF_FORM['update'];
                    } else {
                        $_SESSION['error'] = EntrenadorMessage::ERR_FORM['update'];
                    }
                } else {
                    $_SESSION['error'] = EntrenadorMessage::ERR_FORM['empty_marca'];
                }

                // Verifico si la descripcion no está vacía
                if (!empty($newDescription)) {
                    $EntrenadorValid->setNombre($newDescription);

                    $result = $this->model->modify($EntrenadorValid);

                    if ($result == true) {
                        $_SESSION['info'] = EntrenadorMessage::INF_FORM['update'];
                    } else {
                        $_SESSION['error'] = EntrenadorMessage::ERR_FORM['update'];
                    }
                } else {
                    $_SESSION['error'] = EntrenadorMessage::ERR_FORM['empty_descripcion'];
                }

                // Verifico si el precio no está vacío
                if (!empty($newPrice)) {
                    $EntrenadorValid->setNombre($newPrice);

                    $result = $this->model->modify($EntrenadorValid);

                    if ($result == true) {
                        $_SESSION['info'] = EntrenadorMessage::INF_FORM['update'];
                    } else {
                        $_SESSION['error'] = EntrenadorMessage::ERR_FORM['update'];
                    }
                } else {
                    $_SESSION['error'] = EntrenadorMessage::ERR_FORM['empty_precio'];
                }

                // Verifico si el stock no está vacío
                if (!empty($newStock)) {
                    $EntrenadorValid->setNombre($newStock);

                    $result = $this->model->modify($EntrenadorValid);

                    if ($result == true) {
                        $_SESSION['info'] = EntrenadorMessage::INF_FORM['update'];
                    } else {
                        $_SESSION['error'] = EntrenadorMessage::ERR_FORM['update'];
                    }
                } else {
                    $_SESSION['error'] = EntrenadorMessage::ERR_FORM['empty_stock'];
                }
            } else {
                $_SESSION['error'] = EntrenadorMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/EntrenadorFormModify.php", $EntrenadorValid);
    }

    public function delete()
    {
        //to do
    }


    /**
     * Carga el formulario de buscar Entrenadoro por id
     * @return void
     */
    public function formSearchById()
    {
        $this->view->display("view/form/EntrenadorFormSearchById.php"); //li passem a la variable template desde la vista a EntrenadorView.class.php
        // Por eso para cada Controller, deberemos crear casi siempre el View y el  DAO de esa clase.
    }


    /**
     * Ejecuta la acción de buscar el Entrenadoro por id
     * @return void
     */
    public function searchById()
    {
        $EntrenadorValid = EntrenadorFormValidation::checkData(EntrenadorFormValidation::SEARCH_FIELDS);

        if (empty($_SESSION['error'])) {
            $Entrenador = $this->model->searchById($EntrenadorValid->getId());

            if (($Entrenador)) { // is NULL or Entrenador object?
                $_SESSION['info'] = EntrenadorMessage::INF_FORM['found'];
                $EntrenadorValid = $Entrenador;
            } else {
                $_SESSION['error'] = EntrenadorMessage::ERR_FORM['not_found'];
            }
        }
        $this->view->display("view/form/EntrenadorList.php", $EntrenadorValid);
    }


    public function ejercicio5()
    {
    }
}
