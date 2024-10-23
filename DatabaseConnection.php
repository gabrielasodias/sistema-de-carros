<?php 

    class DatabaseConnection {
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "carros";
        private $connection;
        
        public function connect() {
            try {
                $stringConnection = "mysql:host=$this->host;dbname=$this->database";
                $this->connection = new PDO($stringConnection, $this->user, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e) {
                die("Erro ao conectar ao banco de dados: ".    
                $e->getMessage());
            }
        }

        public function getConnection() {
            return $this->connection;
        }

        public function disconnect() {
            $this->connection = null;
        }
    }
?>