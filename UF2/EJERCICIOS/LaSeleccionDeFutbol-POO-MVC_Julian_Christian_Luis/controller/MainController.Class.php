<?php
//per poder fer servir l'únic controlador d'aquesta aplicació
// require_once "controller/CategoryController.class.php";
require_once "controller/JugadorController.class.php";
require_once "controller/EntrenadorController.class.php";
require_once "controller/LoginController.class.php";

class MainController
{

    // només tenimm un mètode per saber que se'ns demana des de la vista i poder actuar segons el cas
    public function processRequest()
    {

        // PRIMERA MANERA - la que hem fet servir a classe fins ara
        // recuperem l' opció d'un menú
        if (isset($_GET["option"])) {

            $request = $_GET["option"];
        } else {

            $request = NULL;
        }
        // o equivalentment en format comprimit
        //$request=isset($_GET["menu"])?$request=$_GET["menu"]:NULL;


        //SEGONA MANERA - és equivalent a la primera només que utilitzem funcions de filtrat
        //fent servir una altra notació però equivalent al vist ara:
        //$request=NULL;
        //if (filter_has_var(INPUT_GET, 'menu')) {
        //  $request=filter_input(INPUT_GET, 'menu');
        //}
        //equivalentment en format comprimit:
        //$request=filter_has_var(INPUT_GET, 'menu')?filter_input(INPUT_GET, 'menu'):NULL;


        //mirem de quin menú venim
        switch ($request) {
                // si hi haguessin molts controladors, faríem un case per cadascun d'ells. Aquí
                // per defecte fiquem l'únic controlador que hi ha CategoryController
                // en el cas que hi haguessin molts:
            case "ejercicio1":
            case "ejercicio2":
            case "ejercicio3":
            case "ejercicio4":
            case "listar_jugadores":
            case "añadir_jugador":
            case "buscar_jugador_por_id":
            case "borrar_jugador":
                //ficaríem un case per cada controlador
                $controlJugador = new JugadorController();
                $controlJugador->processRequest();
                break;
            case "ejercicio5":
                $controlEntrenador = new EntrenadorController();
                $controlEntrenador->processRequest();
                break;
            case "login":
            case "logout":
                $controlUser = new LoginController();
                $controlUser->processRequest();
                break;
                //en el cas que volguessim carregar alguna vista per defecte fora de la que ens vindrà dels controladors
                //per a nosaltres, la vista primera és la que ens ofereix el menú de categories
            default:
                $controlJugador = new JugadorController();
                $controlJugador->processRequest();
                break;
        }
    }
}
