<?php
    // Include script from the file user.php
    require_once 'user.php';

    // Extend class User
    class Student extends User {
        private $firstName;
        private $lastName;
        private $fn;

        public function __construct($userName, $password, $firstName, $lastName, $fn) {
            // Call the parent's constructor (the constructor of class User)
            parent::__construct($userName, $password);

            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->fn = $fn;
        }

        public function get_first_name() {
            return $this->firstName;
        }

        public function set_first_name($firstName) {
            $this->firstName = $firstName;
        }

        public function get_last_name() {
            return $this->lastName;
        }

        public function set_last_name($lastName) {
            $this->lastName = $lastName;
        }

        public function get_fn() {
            return $this->fn;
        }

        public function set_fn($fn) {
            $this->fn = $fn;
        }

        public function student_info() {
            // parent::getUserName() calls the parent's class method getUserName()
            $studentInfo = parent::getUserName() . ': ' . $this->get_first_name() . ' ' . $this->get_last_name() . ' ' . $this->get_fn();

            return $studentInfo;
        }
    }

    $hash = password_hash('10xFor@llTheFi$h', PASSWORD_DEFAULT);
    // Create new student
    $student = new Student('ivgerves', $hash, 'Ivan', 'Ivanov', 62589);
    // Get student's info
    echo $student->student_info() . "<br/>"; // ivgerves: Ivan Ivanov 62589
    // We can access the public methods of the parent's class
    echo $student->get_password();

    echo '<br/>' . $_COOKIE['test'];
?>