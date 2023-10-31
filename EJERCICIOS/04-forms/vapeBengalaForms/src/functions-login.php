<?php

function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['username'];
    }
    return null;
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username']);
        session_destroy();
        redirect_to('login.php');
    }
}

function obtenerDatosCSV()
{
    $filename = './data/datosUsers.csv';
    $data = [];

    // open the file
    $f = fopen($filename, 'r');

    if ($f === false) {
        die('No se ha podido abrir el archivo ' . $filename);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
    }

    // close the file
    fclose($f);

    return $data;
}

function find_user_by_username(string $username)
{
    $users = obtenerDatosCSV();
    foreach ($users as $uName) {
        if ($uName == $username) {
            return $usuarioEncontrado[$uName] = $users[$uName];
        }
    }
    return false;
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    // if user found, check the password
    if ($user && password_verify($password, $user['password'])) {

        // prevent session fixation attack
        session_regenerate_id();

        // set username in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id']  = $user['id'];


        return true;
    }

    return false;
}

