<?php
    require_once "./db.php";

    class User {
        private $username;
        private $email;
        private $password;
        private $db;

        public function __construct($username) {
            $this->db = new Database();

            $this->username = $username;
        }

        public function isExisting() {
            $result = $this->db->selectUser([":username" => $this->username]);

            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user) {
                $this->email = $user["email"];
                $this->password = $user["password"];

                return true;
            }

            return false;
        }

        public function isPasswordValid($password) {
            return password_verify($password, $this->password);
        }

        public function createUser($email, $password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $this->db->insertUser(["username" => $this->username, "email" => $email, "password" => $hash]);

            $this->email = $email;
            $this->password = $hash;
        }
    }
?>  