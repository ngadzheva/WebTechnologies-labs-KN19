<?php
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

        /** TODO:
         * 
         *  Check whether there is already a user with the same username and/or email
         *  Save user's data only if there are no errors
         * 
        */

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $hash;
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
        echo 'Username: ' . $_SESSION['username'] . '<br/>';
        echo 'Email: ' . $_SESSION['email'] . '<br/>';
        echo 'Password: '. $_SESSION['password'] . '<br/>';
    }

    function modifyInput($text) {
        $text = trim($text);
        $text = htmlspecialchars($text);

        return $text;
    }
?>