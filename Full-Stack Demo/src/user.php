<?php
    require_once "db.php";

    /**
     * Use this class to manage a given user
     * Only this class will have direct access to user's data
     */
    class User {
        private $userName;
        private $password;
        private $email;

        /**
         * This is an object of type Database, which we will use to make queries to the DB
         */
        private $db;

        public function __construct($userName, $password) {
            $this->userName = $userName;
            $this->password = $password;
            $this->db = new Database();
        }

        /**
         * Validate user's data
         * Check whether there is such a user in the DB and whether his password is correct
         */
        public function isValid() {
            /**
             * Call the Database method selectUserQuery with associative array holding the user name of the user
             * The variable $query holds an associative array with the result of the execution of selectUserQuery()
             */
            $query = $this->db->selectUserQuery(array("user" => $this->userName));

            /**
             * If the query was executed successfully we can validate the user's data
             */
            if($query["success"]) { 
                /**
                 * $query["data"] holds a PDO object with the result of the executed query.
                 * We can get the data from the returned result as associative array, calling 
                 * the fetch(PDO::FETCH_ASSOC) method on $query["data"].
                 */
                $user = $query["data"]->fetch(PDO::FETCH_ASSOC);

                /**
                 * If there wasn't found a user with the given user name the $variable $user will be null
                 */
                if($user) {
                    /**
                     * We check whether the inputed from the user password is correct, using password_verify()
                     */
                    if(password_verify($this->password, $user["password"])) {
                        $this->password = $user["password"];
                        $this->email = $user["email"];

                        return array("success" => true);
                    } else {
                        return array("success" => false, "error" => "Грешна парола.");
                    }
                } else {
                    return array("success" => false, "error" => "Грешно потребителско име.");
                }
            } else {
                return array("success" => false, "error" => $query["error"]);
            }
        }

        /**
         * Get the user name of the user
         */
        public function getUsername() {
            return $this->userName;
        }

        /**
         * Get the password of the user
         */
        public function getPassword() {
            return $this->password;
        }

        /**
         * Get the email of the user
         */
        public function getEmail() {
            return $this->email;
        }
    }
?>