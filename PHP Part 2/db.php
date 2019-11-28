<?php
    $host = 'localhost';
    $db_name = 'webtech';
    $user = 'root';
    $password = '';

    try{

        $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $password, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
        // $sql = "CREATE DATABASE www CHARACTER SET utf8 COLLATE utf8_general_ci";
        // $db->exec($sql);
    
        $table = "CREATE TABLE students(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userID INT,
            firstName VARCHAR(30),
            lastName VARCHAR(30),
            fn INT,
            FOREIGN KEY (userID) REFERENCES users(id)
        )";
    
        $db->exec($table);
    
        $username = 'ivan';
        $email = 'ivan@gmail.com';
        $password = 'pass';
    
        //$insert_user = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
        //$db->exec($insert_user);
        
        $insert_user = "INSERT INTO users (username, email, password) VALUES(?, ?, ?)";
        $statement = $db->prepare($insert_user);
        $statement->execute([$username, $email, $password]);

        $select = "SELECT * FROM users WHERE username = :username";
        $select_statement = $db->prepare($select);

        // $select_statement->execute(["username" => "ivan"]);
        //$result = $select_statement->fetchAll();

        // $select_statement->bindParams(":username", $username);
        // $username = "djsd";
        // $select_statement->execute();

        while($row = $select_statement->fetch(PDO::FETCH_ASSOC)) {
            echo $row["username"] . " " . $row["email"];
        }
    } catch(PDOException $ex) {
        echo $ex->getMessage();
    }

    $db = null;
?>
