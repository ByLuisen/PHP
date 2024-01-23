<?php
require_once "model/User.class.php";
require_once "model/persist/DBConnect.class.php";


class UserDAO
{
    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {

        // Simulación de conexión a base de datos con ficheros
        $this->dbConnect = new DBConnect("model/resources/users.csv");
    }
    
    /**
     * Busca al usuario por su nombre 
     * y devuelve su fila
     * @param string username
     */
    public function find_user_by_username($username)
    {
        $users = $this->dbConnect->realAllLines();
        foreach ($users as $user) {
            if ($user[0] == $username) {
                return $user;
            }
        }
        return false;
    }
}
