<?php
    /**
     * Use this class to work with a database
     * Only this class will have direct access to the database
     */
    class Database {
        /**
         * This is a PDO object, which holds the connection to the DB
         */
        private $connection;

        /**
         * These are prepared statements
         */
        private $selectUser;

        public function __construct(){
            $config = parse_ini_file("../config/config.ini", true);

            $host = $config['db']['host'];
            $dbname = $config['db']['name'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            $this->init($host, $dbname, $user, $password);
        }

        /**
         * Create connection to the database on given host, database name, user name and password
         * Then create some prepared statements, which we will use frequently
         */
        private function init($host, $database, $userName, $password) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$database", $userName, $password, 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                
                $this->prepareStatements();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        /**
         * Create some prepared statements, which we will use frequently
         */
        private function prepareStatements() {
            $sql = "SELECT * FROM users WHERE userName=:user";
            $this->selectUser = $this->connection->prepare($sql);
        }

        /**
         * We use this method to execute select queries
         * We only execute the created prepared statement for selecting user in DB with new database
         * If the query was executed successfully, we return the result of the executed query
         */
        public function selectUserQuery($data) {
            try{
                $this->selectUser->execute($data);

                return array("success" => true, "data" => $this->selectUser);
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();

                return array("success" => false, "error" => $e->getMessage());
            }
        }

        /**
         * Close the connection to the DB
         */
        function __destruct() {
            $this->connection = null;
        }
    }
?>