<?php
    session_start();
    $errors = [];

    if($_POST) {
        $username = isset($_POST['username']) ? modifyInput($_POST['username']) : '';
        $password = isset($_POST['password']) ? modifyInput($_POST['password']) : '';

        if(!$username || !$password) {
            $errors[] = 'All fields are required';
        }

        // TODO: Check whether a session with needed data is set

        if($username !== $_SESSION['username']) {
            $errors[] = 'Invalid username';
        }

        if(!password_verify($password, $_SESSION['password'])) {
            $errors[] = 'Invalid password';
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
        echo "Logged in <br/>";
        echo "Username: " . $_SESSION['username'] . "<br/>";
        echo "Email: " . $_SESSION['email'] . "<br/>";
    }

    function modifyInput($text) {
        $text = trim($text);
        $text = htmlspecialchars($text);

        return $text;
    }
?>