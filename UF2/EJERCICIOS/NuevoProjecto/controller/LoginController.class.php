<?php
//crido de manera general tot el que necessitaré cridar

require_once "view/LoginView.class.php";
require_once "model/persist/UserDAO.class.php";
require_once "util/LoginMessage.class.php";
require_once "model/User.class.php";
// require_once "util/UserMessage.class.php";
require_once "util/LoginFormValidation.class.php";


class LoginController
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {
        // càrrega de la vista
        $this->view = new LoginView();

        // càrrega del model de dades
        $this->model = new UserDAO(); // Solo tiene un metodo, recoge el fichero al cual está vinculado
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
            case "login": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->formLogin();
                break;
            case "iniciar_sesion":
                $this->iniciarSesion();
                break;
            
            case "logout":
                $this->logout();
                break;
            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->view->display(); //mètode de la classe EntrenadorView.class.php
        }
    }

    public function formLogin()
    {
        $this->view->display("view/form/Login.php"); //li passem la variable que es diu $template a la vista EntrenadorView.class.php
    }

    /**
     *  Se encarga de verificar las credenciales de un usuario 
     * (nombre de usuario y contraseña) para permitir o denegar el acceso
     * @param string username
     * @param string password
     */
    public function login(string $username, string $password): bool
    {
        $user = $this->model->find_user_by_username($username);

        if ($user && password_verify($password, password_hash($user[1], PASSWORD_DEFAULT))) {

            session_regenerate_id();

            $_SESSION['username'] = $user[0];

            return true;
        }

        return false;
    }

    public function iniciarSesion()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $userValid = LoginFormValidation::checkData(LoginFormValidation::VALIDATE_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            if (!$this->login($userValid->getUsuario(), $userValid->getContrasena())) {
                $_SESSION['error'] = 'Usuario o contraseña incorrecto';
                $this->view->display("view/form/Login.php", $userValid);
            } else {
                header('Location: index.php');
            }
        } else {
            $this->view->display("view/form/Login.php", $userValid);
        }
    }

    public static function is_user_logged_in(): void
    {
        if(isset($_SESSION['username'])) {
            include("view/menu/TrainerMenu.html");
        } else {
            include("view/menu/MainMenu.html");
        }
    }

    public function logout(): void
    {
        unset($_SESSION['username']);
        header('Location: index.php');
    }
}
