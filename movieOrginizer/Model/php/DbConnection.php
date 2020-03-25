<?php
class Conn
    {
        private $servername;
        private $dbUsername;
        private $dbPassword;
        private $dbName;
        private $dbPort;

        protected function connect($name)
        {
            $this->servername = "localhost";
            $this->dbUsername = "root";
            $this->dbPassword = "Evaluate531246";
            $this->dbPort = "3306";
            $this->dbName = $name;

            $conn = new mysqli($this->servername, $this->dbUsername, $this->dbPassword, $this->dbName, $this->dbPort);
            return $conn;
        }
        public function disconnect($conn)
        {
            mysqli_close($conn);
        }
    }
?>