<?php
    class User {
        private $userName;
        private $password;

        public function __construct($userName, $password) {
            $this->userName = $userName;
            $this->password = $password;
        }

        public function get_user_name() {
            return $this->userName;
        }

        public function set_user_name($userName) {
            $this->userName = $userName;
        }

        public function get_password() {
            return $this->password;
        }

        public function set_password($password) {
            $this->password = $password;
        }
    }

    /*
        // Hash the password
        $hash = password_hash('10xFor@llTheFi$h', PASSWORD_DEFAULT);
        echo $hash . "<br/>";

        // Make new user
        $user = new User('ivgerves', $hash);

        // Get the user name of the user
        echo $user->get_user_name() . "<br/>"; // ivgerves

        // Verify the password of the user
        $hash = $user->get_password();
        echo (password_verify('10xFor@llTheFi$h', $hash) ? 'Password verified' : 'Wrong password') . "<br/>"; // Password verified
        
        // Change the user name of the user
        $user->set_user_name('newUser');
        echo $user->getUserName() . "<br/>"; // newUser
    */
?>