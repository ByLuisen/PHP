<?php
/**
 * Validaciones de login
 * @author Luis Enrique
 */
class LoginFormValidation
{

    const VALIDATE_FIELDS = array('username', 'password');

    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z0-9]/";

    public static function checkData($fields)
    {
        $username = NULL;
        $password = NULL;


        foreach ($fields as $field) {
            switch ($field) {
                case 'username':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $username = trim(filter_input(INPUT_POST, 'username'));
                    $usernameValid = !preg_match(self::ALPHABETIC, $username);
                    if (empty($username)) {
                        array_push($_SESSION['error'], LoginMessage::ERR_FORM['empty_usuario']);
                    } else if ($usernameValid == FALSE) {
                        array_push($_SESSION['error'], LoginMessage::ERR_FORM['invalid_usuario']);
                    }
                    break;
                case 'password':
                    $password = trim(filter_input(INPUT_POST, 'password'));
                    $passwordValid = !preg_match(self::ALPHABETIC, $password);
                    if (empty($password)) {
                        array_push($_SESSION['error'], LoginMessage::ERR_FORM['empty_contrasena']);
                    } else if ($passwordValid == FALSE) {
                        array_push($_SESSION['error'], LoginMessage::ERR_FORM['invalid_usuario']);
                    }
                    break;
            }
        }

        $username = new User($username, $password);

        return $username;
    }
}
