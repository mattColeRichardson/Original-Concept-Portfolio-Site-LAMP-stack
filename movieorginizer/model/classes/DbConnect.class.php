<?php
class DbConnect
{
    private $servername;
    private $username;
    private $password;
    private $dbName;
    private $dbPort;

    protected function connect($dbName)
    {
        $this->servername = "localhost";
        $this->username = "root";
        //$this->password = "g9QzEqPcUkby";
        $this->password = "Evaluate531246";
        $this->dbPort = "3306";
        $this->dbName = $dbName;

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName, $this->dbPort);
        return $conn;
    }
}
?>