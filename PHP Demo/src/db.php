<?php
    class Database {
        private $connection;

        private $insertUserStatement;
        private $selectUserStatement;

        public function __construct() {
            $config = parse_ini_file("../config/config.ini", true);

            $host = $config['db']['host'];
            $dbname = $config['db']['dbname'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            $this->init($host, $dbname, $user, $password);
        }

        private function init($host, $dbname, $user, $password) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                $this->prepareStatements();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        private function prepareStatements() {
            $sql = "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)";
            $this->insertUserStatement = $this->connection->prepare($sql);

            $sql = "SELECT * FROM users WHERE username=:username";
            $this->selectUserStatement = $this->connection->prepare($sql);
        }

        public function insertUser($data) {
            try {
                $this->connection->beginTransaction();

                $this->insertUserStatement->execute($data);

                $this->connection->commit();
            } catch(PDOException $e) {
                $this->connection->rollBack();
                echo "Inserting user failed: " . $e->getMessage();
            }
        }

        public function selectUser($data) {
            try {
                $this->selectUserStatement->execute($data);

                return $this->selectUserStatement;
            } catch(PDOException $e) {
                echo "Inserting user failed: " . $e->getMessage();
            }
        }

        public function __destruct() {
            $this->connection = null;
        }
    }
?>