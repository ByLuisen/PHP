<?php

// $usernames = ['nom1', 'nom2', 'nom3'];
// $passwords = ['pas1', 'pas2', 'pas3'];

// $inputs = [];
// $errors = [];

// if (is_post_request()) {

//     [$inputs, $errors] = filter($_POST, [
//         'username' => 'string | required',
//         'password' => 'string | required'
//     ]);

//     if ($errors) {
//         redirect_with('login.php', ['errors' => $errors, 'inputs' => $inputs]);
//     }

//     // if login fails
//     if (!login($inputs['username'], $inputs['password'])) {

//         $errors['login'] = 'Invalid username or password';

//         redirect_with('login.php', [
//             'errors' => $errors,
//             'inputs' => $inputs
//         ]);
//     }
//     // login successfully
//     redirect_to('index.php');

// } else if (is_get_request()) {
//     [$errors, $inputs] = session_flash('errors', 'inputs');
// }

// function find_user_by_username(string $username)
// {
//     $sql = 'SELECT username, password
//             FROM users
//             WHERE username=:username';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':username', $username, PDO::PARAM_STR);
//     $statement->execute();

//     return $statement->fetch(PDO::FETCH_ASSOC);
// }

// function login(string $username, string $password): bool
// {
//     $user = find_user_by_username($username);

//     // if user found, check the password
//     if ($user && password_verify($password, $user['password'])) {

//         // prevent session fixation attack
//         session_regenerate_id();

//         // set username in the session
//         $_SESSION['username'] = $user['username'];
//         $_SESSION['user_id']  = $user['id'];


//         return true;
//     }

//     return false;
//  } 
