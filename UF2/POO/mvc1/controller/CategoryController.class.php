<?php
//crido de manera general tot el que necessitaré cridar

require_once "controller/ControllerInterface.php";
require_once "view/CategoryView.class.php";
require_once "model/persist/CategoryDAO.class.php";
require_once "model/Category.class.php";
require_once "util/CategoryMessage.class.php";
require_once "util/CategoryFormValidation.class.php";

class CategoryController implements ControllerInterface
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new CategoryView();

        // càrrega del model de dades
        $this->model = new CategoryDAO();
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
            case "list_all": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->listAll();
                break;

            case "form_add": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->formAdd();
                break;

            case "add": //opció de formulari
                $this->add();
                break;

            case "form_id":
            case "form_modify":
            case "form_delete":
                $this->formId();
                break;

            case "search":
                $this->searchById();
                break;

            case "modify":
                $this->modify();
                break;

            case "delete":
                $this->delete();
                break;

            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe CategoryView.class.php
        }
    }

    //carrega el llistat de totes les categories
    public function listAll()
    {
        $categories = array();
        //necessitem cridar al model
        $categories = $this->model->listAll();

        if (!empty($categories)) { // array void or array of Category objects?
            $_SESSION['info'] = CategoryMessage::INF_FORM['found'];
        } else {
            $_SESSION['error'] = CategoryMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/CategoryList.php", $categories);
    }


    // carrega el formulari d'insertar categoria
    public function formAdd()
    {
        $this->view->display("view/form/CategoryFormAdd.php"); //li passem la variable que es diu $template a la vista CategoryView.class.php
    }

    // ejecuta la acción de insertar categoría
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::ADD_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $category = $this->model->searchById($categoryValid->getId());

            //si no hem trobat l'id...
            if (is_null($category)) {
                //afegim la categoria a l'arxiu
                $result = $this->model->add($categoryValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = CategoryMessage::INF_FORM['insert'];
                    $categoryValid = NULL;
                }
            } else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['exists_id'];
            }
        }

        $this->view->display("view/form/CategoryFormAdd.php", $categoryValid);
    }

    public function formId()
    {
        $this->view->display("view/form/ProductsFormId.php"); //li passem la variable que es diu $template a la vista ProductsView.class.php
    }
    public function searchById()
    {
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::SEARCH_FIELDS);

        if (empty($_SESSION['error'])) {
            $category = $this->model->searchById($categoryValid->getId());

            if (!is_null($category)) { // is NULL or Category object?
                $_SESSION['info'] = CategoryMessage::INF_FORM['found'];
                $categoryValid = $category;
                switch ($_GET['option']) {
                    case 'form_modify':
                        $this->view->display("view/form/CategoryFormAdd.php", $categoryValid[0]);
                        break;
                    case 'form_id':
                        $this->view->display("view/form/CategoryList.php", $categoryValid);
                        break;
                }
            } else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['not_found'];
                $this->view->display("view/form/ProductsFormId.php", $categoryValid);
            }
        } else {
            $this->view->display("view/form/ProductsFormId.php", $categoryValid);
        }
    }

    //aquests mètodes els deixem ara per ara així
    public function modify()
    {
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::MODIFY_FIELDS);

        if (empty($_SESSION['error'])) {
            $category = $this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {
                $result = $this->model->modify($categoryValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = CategoryMessage::INF_FORM['update'];
                }
            } else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/CategoryFormAdd.php", $categoryValid);
    }
    public function delete()
    {
        $categoryValid = CategoryFormValidation::checkData(CategoryFormValidation::DELETE_FIELDS);

        if (empty($_SESSION['error'])) {
            $category = $this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {
                $result = $this->model->delete($categoryValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info'] = CategoryMessage::INF_FORM['delete'];
                    $categoryValid = NULL;
                }
            } else {
                $_SESSION['error'] = CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/ProductsFormId.php", $categoryValid);
    }
}
