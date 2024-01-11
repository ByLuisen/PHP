<?php
//crido de manera general tot el que necessitaré cridar

require_once "controller/ControllerInterface.php";
require_once "view/ProductsView.class.php";
require_once "model/persist/ProductDAO.class.php";
require_once "model/Product.class.php";
require_once "util/ProductsMessage.class.php";
require_once "util/ProductsFormValidation.class.php";

class ProductsController implements ControllerInterface
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new ProductsView();

        // càrrega del model de dades
        $this->model = new ProductDAO();
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
                $this->view->display(); //mètode de la classe ProductsView.class.php
        }
    }

    //carrega el llistat de totes les categories
    public function listAll()
    {
        $categories = array();
        //necessitem cridar al model
        $categories = $this->model->listAll();

        if (!empty($categories)) { // array void or array of Product objects?
            $_SESSION['info'] = ProductsMessage::INF_FORM['found'];
        } else {
            $_SESSION['error'] = ProductsMessage::ERR_FORM['not_found'];
        }

        $this->view->display("view/form/ProductsList.php", $categories);
    }


    // carrega el formulari d'insertar categoria
    public function formAdd()
    {
        $this->view->display("view/form/ProductsFormAdd.php"); //li passem la variable que es diu $template a la vista ProductsView.class.php
    }

    // ejecuta la acción de insertar categoría
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $productValid = ProductsFormValidation::checkData(ProductsFormValidation::ADD_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $product = $this->model->searchById($productValid->getId());

            //si no hem trobat l'id...
            if (is_null($product)) {
                //afegim la categoria a l'arxiu
                $result = $this->model->add($productValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = ProductsMessage::INF_FORM['insert'];
                    $productValid = NULL;
                }
            } else {
                $_SESSION['error'] = ProductsMessage::ERR_FORM['exists_id'];
            }
        }

        $this->view->display("view/form/ProductsFormAdd.php", $productValid);
    }

    public function formId()
    {
        $this->view->display("view/form/ProductsFormId.php"); //li passem la variable que es diu $template a la vista ProductsView.class.php
    }

    // ejecuta la acción de buscar categoría por id de categoría
    public function searchById()
    {
        $productValid = ProductsFormValidation::checkData(ProductsFormValidation::SEARCH_FIELDS);

        if (empty($_SESSION['error'])) {
            $product = $this->model->searchById($productValid->getId());

            if (!is_null($product)) { // is NULL or Category object?
                $_SESSION['info'] = ProductsMessage::INF_FORM['found'];
                $productValid = $product;
                switch ($_GET['option']) {
                    case 'form_modify':
                        $this->view->display("view/form/ProductsFormAdd.php", $productValid[0]);
                        break;
                    case 'form_id':
                        $this->view->display("view/form/ProductsList.php", $productValid);
                        break;
                }
            } else {
                $_SESSION['error'] = ProductsMessage::ERR_FORM['not_found'];
                $this->view->display("view/form/ProductsFormId.php", $productValid);
            }
        } else {
            $this->view->display("view/form/ProductsFormId.php", $productValid);
        }
    }

    // executaria la modificació si el programessim al menú 
    public function modify()
    {
        $productValid = ProductsFormValidation::checkData(ProductsFormValidation::MODIFY_FIELDS);

        if (empty($_SESSION['error'])) {
            $product = $this->model->searchById($productValid->getId());

            if (!is_null($product)) {
                $result = $this->model->modify($productValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = ProductsMessage::INF_FORM['update'];
                }
            } else {
                $_SESSION['error'] = ProductsMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/ProductsFormAdd.php", $productValid);
    }

    public function delete()
    {
        $productValid=ProductsFormValidation::checkData(ProductsFormValidation::DELETE_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $product=$this->model->searchById($productValid->getId());

            if (!is_null($product)) {            
                $result=$this->model->delete($productValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info']=ProductsMessage::INF_FORM['delete'];
                    $productValid=NULL;
                }
            }
            else {
                $_SESSION['error']=ProductsMessage::ERR_FORM['not_exists_id'];
            }
        }
        
        $this->view->display("view/form/ProductsFormId.php", $productValid);
    }
    /*
    // carga el formulario de buscar productos por nombre de categoría
    public function formListProducts() {
        $this->view->display("view/form/CategoryFormSearchProduct.php");
    }    
    
    // ejecuta la acción de buscar productos por nombre de categoría
    public function listProducts() {
        $name=trim(filter_input(INPUT_POST, 'name'));

        $result=NULL;
        if (!empty($name)) { // Category Name is void?
            $result=$this->model->listProducts($name);            

            if (!empty($result)) { // array void or array of Product objects?
                $_SESSION['info']="Data found"; 
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
            }
            
            $this->view->display("view/form/CategoryListProduct.php", $result);
        }
        else {
            $_SESSION['error']=CategoryMessage::ERR_FORM['invalid_name'];
            
            $this->view->display("view/form/CategoryFormSearchProduct.php", $result);
        }
    }
    */
}
