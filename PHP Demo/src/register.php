<?php
    require_once "./user.php";

    session_start();
    $errors = [];

    if($_POST) {
        $username = isset($_POST['username']) ? modifyInput($_POST['username']) : '';
        $email = isset($_POST['email']) ? modifyInput($_POST['email']) : '';
        $password = isset($_POST['password']) ? modifyInput($_POST['password']) : '';
        $confirmPassword = isset($_POST['confirm-password']) ? modifyInput($_POST['confirm-password']) : '';

        if(!$username || !$email || !$password || !$confirmPassword) {
            $errors[] = 'All fields are required';
        }

        if(mb_strlen($username) > 20) {
            $errors[] = 'The username must be less than 20 symbols';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter valid email';
        }

        if($password !== $confirmPassword) {
            $errors[] = 'Passwords must match';
        }

        $user = new User($username);

        if($user->isExisting()) {
            $errors[] = 'Username is already taken';
        } else {
            $user->createUser($email, $password);
        }
    } else {
        http_response_code(400);
        echo 'Invalid request';
    }

    if($errors) {
        http_response_code(401);

        foreach($errors as $value) {
            echo $value . '<br/>';
        }

        session_unset();
        session_destroy();
    } else {
        echo 'Registration is successful <br/>';
        echo 'Username: ' . $username;
    }

    function modifyInput($text) {
        $text = trim($text);
        $text = htmlspecialchars($text);

        return $text;
    }
?>