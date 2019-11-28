<?php
    require_once "./user.php";

    session_start();
    $errors = [];

    if($_POST) {
        $username = isset($_POST['username']) ? modifyInput($_POST['username']) : '';
        $password = isset($_POST['password']) ? modifyInput($_POST['password']) : '';

        if(!$username || !$password) {
            $errors[] = 'All fields are required';
        } else {
            $user = new User($username);

            if(!$user->isExisting()) {
                $errors[] = 'User not found';
            } else {
                if(!$user->isPasswordValid($password)) {
                    $errors[] = 'Invalid password';
                } else {
                    $_SESSION['username']  = $username;
                }
            }
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
    }

    function modifyInput($text) {
        $text = trim($text);
        $text = htmlspecialchars($text);

        return $text;
    }
?>