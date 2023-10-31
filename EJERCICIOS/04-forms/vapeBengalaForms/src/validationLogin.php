<?php

require_once('functions.php');
require_once('datos.php');

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputsLogin = [];
$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // sanitize & validate user inputs
    [$inputsLogin, $errorsLogin] = filter($_POST, [
        'username' => 'string | required',
        'password' => 'string | required'
    ]);

    // if validation error
    if ($errorsLogin) {
        redirect_with('login.php', [
            'errorsLogin' => $errorsLogin,
            'inputsLogin' => $inputsLogin
        ]);
    }

    // if login fails
    if (!login($inputsLogin['username'], $inputsLogin['password'])) {

        $errorsLogin['login'] = 'Invalid username or password';

        redirect_with('login.php', [
            'errorsLogin' => $errorsLogin,
            'inputsLogin' => $inputsLogin
        ]);
    }

    // login successfully
    redirect_to('index.php');
}